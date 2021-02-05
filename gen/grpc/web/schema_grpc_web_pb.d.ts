import * as grpcWeb from 'grpc-web';

import * as google_protobuf_empty_pb from 'google-protobuf/google/protobuf/empty_pb';
import * as schema_pb from './schema_pb';


export class EventGateServiceClient {
  constructor (hostname: string,
               credentials?: null | { [index: string]: string; },
               options?: null | { [index: string]: any; });

  send(
    request: schema_pb.Event,
    metadata: grpcWeb.Metadata | undefined,
    callback: (err: grpcWeb.Error,
               response: google_protobuf_empty_pb.Empty) => void
  ): grpcWeb.ClientReadableStream<google_protobuf_empty_pb.Empty>;

  request(
    request: schema_pb.Event,
    metadata: grpcWeb.Metadata | undefined,
    callback: (err: grpcWeb.Error,
               response: schema_pb.Event) => void
  ): grpcWeb.ClientReadableStream<schema_pb.Event>;

  receive(
    request: schema_pb.Filter,
    metadata?: grpcWeb.Metadata
  ): grpcWeb.ClientReadableStream<schema_pb.Event>;

}

export class EventGateServicePromiseClient {
  constructor (hostname: string,
               credentials?: null | { [index: string]: string; },
               options?: null | { [index: string]: any; });

  send(
    request: schema_pb.Event,
    metadata?: grpcWeb.Metadata
  ): Promise<google_protobuf_empty_pb.Empty>;

  request(
    request: schema_pb.Event,
    metadata?: grpcWeb.Metadata
  ): Promise<schema_pb.Event>;

  receive(
    request: schema_pb.Filter,
    metadata?: grpcWeb.Metadata
  ): grpcWeb.ClientReadableStream<schema_pb.Event>;

}

