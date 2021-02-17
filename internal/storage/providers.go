package storage

import (
	"context"
	"crypto/tls"
	stategate "github.com/autom8ter/stategate/gen/grpc/go"
	"github.com/autom8ter/stategate/internal/errorz"
	"github.com/autom8ter/stategate/internal/logger"
	"github.com/autom8ter/stategate/internal/storage/mongo"
	"github.com/pkg/errors"
	mongo2 "go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
	"go.uber.org/zap"
	"time"
)

type Provider interface {
	SetObject(ctx context.Context, object *stategate.Object) *errorz.Error
	SaveEvent(ctx context.Context, event *stategate.Event) *errorz.Error
	GetObject(ctx context.Context, ref *stategate.ObjectRef) (*stategate.Object, *errorz.Error)
	DelObject(ctx context.Context, ref *stategate.ObjectRef) *errorz.Error
	SearchObjects(ctx context.Context, ref *stategate.SearchObjectOpts) (*stategate.Objects, *errorz.Error)
	SearchEvents(ctx context.Context, ref *stategate.SearchEventOpts) (*stategate.Events, *errorz.Error)
	Close() error
}

type ProviderName string

const (
	MONGO_STORAGE ProviderName = "mongo"
)

var AllProviderNames = []ProviderName{MONGO_STORAGE}

func GetStorageProvider(lgger *logger.Logger, providerConfig map[string]string) (Provider, error) {
	if providerConfig == nil {
		return nil, errors.Errorf("empty backend storage provider config")
	}
	name := providerConfig["name"]
	if name == "" {
		return nil, errors.New("storage provider: empty name")
	}
	var tlsConfig *tls.Config
	if providerConfig["client_cert_file"] != "" && providerConfig["client_key_file"] != "" {
		cer, err := tls.LoadX509KeyPair(providerConfig["tls_cert"], providerConfig["tls_key"])
		if err != nil {
			lgger.Error("failed to load tls config", zap.Error(err))
			return nil, err
		}
		tlsConfig = &tls.Config{
			Certificates: []tls.Certificate{cer},
		}
	}
	switch ProviderName(name) {
	case MONGO_STORAGE:
		db := providerConfig["database"]
		if db == "" {
			return nil, errors.New("mongo config: empty database")
		}
		uri := providerConfig["addr"]
		if uri == "" {
			return nil, errors.New("mongo config: empty addr")
		}
		opts := options.Client()
		opts.ApplyURI(uri)
		if tlsConfig != nil {
			opts.TLSConfig = tlsConfig
		}
		client, err := mongo2.NewClient(opts)
		if err != nil {
			return nil, err
		}
		ctx, cancel := context.WithTimeout(context.Background(), 10*time.Second)
		defer cancel()
		err = client.Connect(ctx)
		if err != nil {
			return nil, err
		}
		return mongo.NewProvider(client.Database(db)), nil
	default:
		return nil, errors.Errorf("unsupported backend provider: %s. must be one of: %v", name, AllProviderNames)
	}
}
