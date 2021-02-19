package server

import (
	"context"
	"crypto/tls"
	"fmt"
	stategate "github.com/autom8ter/stategate/gen/grpc/go"
	"github.com/autom8ter/stategate/internal/auth"
	"github.com/autom8ter/stategate/internal/channel"
	"github.com/autom8ter/stategate/internal/logger"
	"github.com/autom8ter/stategate/internal/service"
	"github.com/autom8ter/stategate/internal/storage"
	grpc_zap "github.com/grpc-ecosystem/go-grpc-middleware/logging/zap"
	grpc_recovery "github.com/grpc-ecosystem/go-grpc-middleware/recovery"
	grpc_validator "github.com/grpc-ecosystem/go-grpc-middleware/validator"
	grpc_prometheus "github.com/grpc-ecosystem/go-grpc-prometheus"
	"github.com/grpc-ecosystem/grpc-gateway/v2/runtime"
	"github.com/improbable-eng/grpc-web/go/grpcweb"
	"github.com/pkg/errors"
	"github.com/prometheus/client_golang/prometheus/promhttp"
	"github.com/soheilhy/cmux"
	"go.uber.org/zap"
	"golang.org/x/sync/errgroup"
	"google.golang.org/grpc"
	"google.golang.org/grpc/credentials"
	"google.golang.org/grpc/reflection"
	"net"
	"net/http"
	"net/http/pprof"
	"os"
	"os/signal"
	"strings"
	"syscall"
	"time"
)

func ListenAndServe(ctx context.Context, lgger *logger.Logger, c *Config) error {
	group, ctx := errgroup.WithContext(ctx)

	var (
		interrupt = make(chan os.Signal, 1)
		apiLis    net.Listener
		tlsConfig *tls.Config
	)

	if c.TLSKeyFile != "" && c.TLSCertFile != "" {
		cer, err := tls.LoadX509KeyPair(c.TLSCertFile, c.TLSKeyFile)
		if err != nil {
			lgger.Error("failed to load tls config", zap.Error(err))
			return err
		}
		tlsConfig = &tls.Config{
			Certificates: []tls.Certificate{cer},
		}
	}

	signal.Notify(interrupt, os.Interrupt, syscall.SIGTERM)
	defer signal.Stop(interrupt)
	{
		addr, err := net.ResolveTCPAddr("tcp", fmt.Sprintf(":%v", c.Port))
		if err != nil {
			return errors.Wrap(err, "failed to create listener")
		}
		apiLis, err = net.ListenTCP("tcp", addr)
		if err != nil {
			return errors.Wrap(err, "failed to create api server listener")
		}
	}
	defer apiLis.Close()
	apiMux := cmux.New(apiLis)
	apiMux.SetReadTimeout(1 * time.Second)
	grpcMatcher := apiMux.MatchWithWriters(cmux.HTTP2MatchHeaderFieldSendSettings("content-type", "application/grpc"))

	defer grpcMatcher.Close()
	group.Go(func() error {
		if err := apiMux.Serve(); err != nil && !strings.Contains(err.Error(), "closed network connection") {
			return errors.Wrap(err, "listener mux error")
		}
		return nil
	})

	var metricServer *http.Server

	router := http.NewServeMux()
	router.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		w.WriteHeader(http.StatusOK)
	})
	router.Handle("/metrics", promhttp.Handler())
	router.HandleFunc("/debug/pprof/", pprof.Index)
	router.HandleFunc("/debug/pprof/cmdline", pprof.Cmdline)
	router.HandleFunc("/debug/pprof/profile", pprof.Profile)
	router.HandleFunc("/debug/pprof/symbol", pprof.Symbol)
	router.HandleFunc("/debug/pprof/trace", pprof.Trace)
	metricServer = &http.Server{Handler: router}
	if tlsConfig != nil {
		metricServer.TLSConfig = tlsConfig
		metricServer.TLSNextProto = map[string]func(*http.Server, *tls.Conn, http.Handler){}
	}
	group.Go(func() error {
		addr, err := net.ResolveTCPAddr("tcp", fmt.Sprintf(":%v", c.Port+1))
		if err != nil {
			return errors.Wrap(err, "failed to create metrics listener")
		}
		metricsLis, err := net.ListenTCP("tcp", addr)
		if err != nil {
			return errors.Wrap(err, "failed to create metrics listener")
		}
		defer metricsLis.Close()
		lgger.Debug("starting metrics server", zap.String("address", metricsLis.Addr().String()))
		if err := metricServer.Serve(metricsLis); err != nil && err != http.ErrServerClosed {
			return errors.Wrap(err, "metrics server failure")
		}
		return nil
	})
	unary := []grpc.UnaryServerInterceptor{
		grpc_prometheus.UnaryServerInterceptor,
		grpc_zap.UnaryServerInterceptor(lgger.Zap()),
	}
	stream := []grpc.StreamServerInterceptor{
		grpc_prometheus.StreamServerInterceptor,
		grpc_zap.StreamServerInterceptor(lgger.Zap()),
	}
	if !c.AuthDisabled {
		a, err := auth.NewAuth(c.RequestPolicy, c.ResponsePolicy, c.JWKSUri, lgger)
		if err != nil {
			return err
		}
		unary = append(unary, a.UnaryInterceptor())
		stream = append(stream, a.StreamInterceptor())
	}
	unary = append(unary, grpc_validator.UnaryServerInterceptor(), grpc_recovery.UnaryServerInterceptor())
	stream = append(stream, grpc_validator.StreamServerInterceptor(), grpc_recovery.StreamServerInterceptor())

	gopts := []grpc.ServerOption{
		grpc.ChainUnaryInterceptor(unary...),
		grpc.ChainStreamInterceptor(stream...),
	}
	if tlsConfig != nil {
		gopts = append(gopts, grpc.Creds(credentials.NewTLS(tlsConfig)))
	}
	strgProvider, err := storage.GetStorageProvider(lgger, c.StorageProvider)
	if err != nil {
		return errors.Wrap(err, "failed to setup storage provider")
	}
	defer strgProvider.Close()
	channelProvider, err := channel.GetChannelProvider(lgger, c.ChannelProvider)
	if err != nil {
		return errors.Wrap(err, "failed to setup channel provider")
	}
	defer channelProvider.Close()
	svc, err := service.NewService(strgProvider, channelProvider, lgger)
	if err != nil {
		return errors.Wrap(err, "failed to setup service")
	}
	gserver := grpc.NewServer(gopts...)
	stategate.RegisterEventServiceServer(gserver, svc.EventServiceServer())
	stategate.RegisterObjectServiceServer(gserver, svc.ObjectServiceServer())
	reflection.Register(gserver)
	grpc_prometheus.Register(gserver)

	group.Go(func() error {
		lgger.Debug("starting grpc server",
			zap.String("address", grpcMatcher.Addr().String()),
		)
		if err := gserver.Serve(grpcMatcher); err != nil {
			return errors.Wrap(err, "grpc server failure")
		}
		return nil
	})

	conn, err := grpc.DialContext(context.Background(), fmt.Sprintf("localhost:%v", c.Port),
		grpc.WithInsecure(),
		grpc.WithBlock(),
	)
	if err != nil {
		return errors.Wrap(err, "failed to setup graphql server")
	}
	defer conn.Close()
	mux := http.NewServeMux()

	restMux := runtime.NewServeMux()
	if err := stategate.RegisterEventServiceHandler(ctx, restMux, conn); err != nil {
		return errors.Wrap(err, "failed to register REST event endpoints")
	}
	if err := stategate.RegisterObjectServiceHandler(ctx, restMux, conn); err != nil {
		return errors.Wrap(err, "failed to register REST object endpoints")
	}
	mux.Handle("/", restMux)

	var httpServer *http.Server
	httpServer = &http.Server{
		Handler: mux,
	}
	if tlsConfig != nil {
		httpServer.TLSConfig = tlsConfig
		httpServer.TLSNextProto = map[string]func(*http.Server, *tls.Conn, http.Handler){}
	}
	wrappedGrpc := grpcweb.WrapServer(
		gserver,
		grpcweb.WithWebsockets(true),
		grpcweb.WithWebsocketPingInterval(15*time.Second),
	)
	httpServer.Handler = http.HandlerFunc(func(resp http.ResponseWriter, req *http.Request) {
		if wrappedGrpc.IsGrpcWebRequest(req) {
			wrappedGrpc.ServeHTTP(resp, req)
		} else {
			mux.ServeHTTP(resp, req)
		}
	})
	group.Go(func() error {
		httpMatchermatcher := apiMux.Match(cmux.Any())
		defer httpMatchermatcher.Close()
		lgger.Debug("starting http server", zap.String("address", httpMatchermatcher.Addr().String()))
		if err := httpServer.Serve(httpMatchermatcher); err != nil && err != http.ErrServerClosed && !strings.Contains(err.Error(), "use of closed network connection") {
			return errors.Wrap(err, "http server failure")
		}
		return nil
	})
	group.Go(func() error {
		ctx, cancel := context.WithCancel(ctx)
		defer cancel()
		select {
		case <-interrupt:
			cancel()
			break
		case <-ctx.Done():
			break
		}

		lgger.Debug("shutdown signal received")
		shutdownctx, shutdowncancel := context.WithTimeout(context.Background(), 15*time.Second)
		defer shutdowncancel()
		shutdownGroup, shutdownctx := errgroup.WithContext(shutdownctx)

		shutdownGroup.Go(func() error {
			httpServer.Shutdown(shutdownctx)
			lgger.Debug("shutdown http server")
			return nil
		})
		shutdownGroup.Go(func() error {
			metricServer.Shutdown(shutdownctx)
			lgger.Debug("shutdown metrics server")
			return nil
		})
		shutdownGroup.Go(func() error {
			stopped := make(chan struct{})
			go func() {
				gserver.GracefulStop()
				stopped <- struct{}{}
			}()
			select {
			case <-time.After(15 * time.Second):
				gserver.Stop()
			case <-stopped:
				close(stopped)
				break
			}
			lgger.Debug("shutdown gRPC server")
			return nil
		})
		return shutdownGroup.Wait()
	})

	return group.Wait()
}
