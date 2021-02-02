# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

import sys
_b=sys.version_info[0]<3 and (lambda x:x) or (lambda x:x.encode('latin1'))
from google.protobuf import descriptor as _descriptor
from google.protobuf import message as _message
from google.protobuf import reflection as _reflection
from google.protobuf import symbol_database as _symbol_database
# @@protoc_insertion_point(imports)

_sym_db = _symbol_database.Default()


from google.api import annotations_pb2 as google_dot_api_dot_annotations__pb2
from google.protobuf import struct_pb2 as google_dot_protobuf_dot_struct__pb2
from google.protobuf import timestamp_pb2 as google_dot_protobuf_dot_timestamp__pb2
from google.protobuf import any_pb2 as google_dot_protobuf_dot_any__pb2
from google.protobuf import empty_pb2 as google_dot_protobuf_dot_empty__pb2
from github.com.mwitkow.go_proto_validators import validator_pb2 as github_dot_com_dot_mwitkow_dot_go__proto__validators_dot_validator__pb2


DESCRIPTOR = _descriptor.FileDescriptor(
  name='schema.proto',
  package='cloudEventsProxy',
  syntax='proto3',
  serialized_options=_b('Z\020cloudEventsProxy'),
  serialized_pb=_b('\n\x0cschema.proto\x12\x10\x63loudEventsProxy\x1a\x1cgoogle/api/annotations.proto\x1a\x1cgoogle/protobuf/struct.proto\x1a\x1fgoogle/protobuf/timestamp.proto\x1a\x19google/protobuf/any.proto\x1a\x1bgoogle/protobuf/empty.proto\x1a\x36github.com/mwitkow/go-proto-validators/validator.proto\"A\n\x0eReceiveRequest\x12\x1e\n\x04type\x18\x01 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x0f\n\x07subject\x18\x02 \x01(\t\"\xe7\x01\n\x0f\x43loudEventInput\x12%\n\x0bspecversion\x18\x01 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12 \n\x06source\x18\x02 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x1e\n\x04type\x18\x03 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x0f\n\x07subject\x18\x04 \x01(\t\x12+\n\nattributes\x18\x05 \x01(\x0b\x32\x17.google.protobuf.Struct\x12-\n\x04\x64\x61ta\x18\x06 \x01(\x0b\x32\x17.google.protobuf.StructB\x06\xe2\xdf\x1f\x02 \x01\"\xaa\x02\n\nCloudEvent\x12%\n\x0bspecversion\x18\x01 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x1c\n\x02id\x18\x02 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12 \n\x06source\x18\x03 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x1e\n\x04type\x18\x04 \x01(\tB\x10\xe2\xdf\x1f\x0c\n\n^.{1,225}$\x12\x0f\n\x07subject\x18\x05 \x01(\t\x12+\n\nattributes\x18\x06 \x01(\x0b\x32\x17.google.protobuf.Struct\x12-\n\x04\x64\x61ta\x18\x07 \x01(\x0b\x32\x17.google.protobuf.StructB\x06\xe2\xdf\x1f\x02 \x01\x12(\n\x04time\x18\x08 \x01(\x0b\x32\x1a.google.protobuf.Timestamp2\xac\x02\n\x12\x43loudEventsService\x12S\n\x04Send\x12!.cloudEventsProxy.CloudEventInput\x1a\x16.google.protobuf.Empty\"\x10\x82\xd3\xe4\x93\x02\n\"\x05/send:\x01*\x12_\n\x07Request\x12!.cloudEventsProxy.CloudEventInput\x1a\x1c.cloudEventsProxy.CloudEvent\"\x13\x82\xd3\xe4\x93\x02\r\"\x08/request:\x01*\x12`\n\x07Receive\x12 .cloudEventsProxy.ReceiveRequest\x1a\x1c.cloudEventsProxy.CloudEvent\"\x13\x82\xd3\xe4\x93\x02\r\"\x08/receive:\x01*0\x01\x42\x12Z\x10\x63loudEventsProxyb\x06proto3')
  ,
  dependencies=[google_dot_api_dot_annotations__pb2.DESCRIPTOR,google_dot_protobuf_dot_struct__pb2.DESCRIPTOR,google_dot_protobuf_dot_timestamp__pb2.DESCRIPTOR,google_dot_protobuf_dot_any__pb2.DESCRIPTOR,google_dot_protobuf_dot_empty__pb2.DESCRIPTOR,github_dot_com_dot_mwitkow_dot_go__proto__validators_dot_validator__pb2.DESCRIPTOR,])




_RECEIVEREQUEST = _descriptor.Descriptor(
  name='ReceiveRequest',
  full_name='cloudEventsProxy.ReceiveRequest',
  filename=None,
  file=DESCRIPTOR,
  containing_type=None,
  fields=[
    _descriptor.FieldDescriptor(
      name='type', full_name='cloudEventsProxy.ReceiveRequest.type', index=0,
      number=1, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='subject', full_name='cloudEventsProxy.ReceiveRequest.subject', index=1,
      number=2, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
  ],
  extensions=[
  ],
  nested_types=[],
  enum_types=[
  ],
  serialized_options=None,
  is_extendable=False,
  syntax='proto3',
  extension_ranges=[],
  oneofs=[
  ],
  serialized_start=239,
  serialized_end=304,
)


_CLOUDEVENTINPUT = _descriptor.Descriptor(
  name='CloudEventInput',
  full_name='cloudEventsProxy.CloudEventInput',
  filename=None,
  file=DESCRIPTOR,
  containing_type=None,
  fields=[
    _descriptor.FieldDescriptor(
      name='specversion', full_name='cloudEventsProxy.CloudEventInput.specversion', index=0,
      number=1, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='source', full_name='cloudEventsProxy.CloudEventInput.source', index=1,
      number=2, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='type', full_name='cloudEventsProxy.CloudEventInput.type', index=2,
      number=3, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='subject', full_name='cloudEventsProxy.CloudEventInput.subject', index=3,
      number=4, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='attributes', full_name='cloudEventsProxy.CloudEventInput.attributes', index=4,
      number=5, type=11, cpp_type=10, label=1,
      has_default_value=False, default_value=None,
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='data', full_name='cloudEventsProxy.CloudEventInput.data', index=5,
      number=6, type=11, cpp_type=10, label=1,
      has_default_value=False, default_value=None,
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\002 \001'), file=DESCRIPTOR),
  ],
  extensions=[
  ],
  nested_types=[],
  enum_types=[
  ],
  serialized_options=None,
  is_extendable=False,
  syntax='proto3',
  extension_ranges=[],
  oneofs=[
  ],
  serialized_start=307,
  serialized_end=538,
)


_CLOUDEVENT = _descriptor.Descriptor(
  name='CloudEvent',
  full_name='cloudEventsProxy.CloudEvent',
  filename=None,
  file=DESCRIPTOR,
  containing_type=None,
  fields=[
    _descriptor.FieldDescriptor(
      name='specversion', full_name='cloudEventsProxy.CloudEvent.specversion', index=0,
      number=1, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='id', full_name='cloudEventsProxy.CloudEvent.id', index=1,
      number=2, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='source', full_name='cloudEventsProxy.CloudEvent.source', index=2,
      number=3, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='type', full_name='cloudEventsProxy.CloudEvent.type', index=3,
      number=4, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\014\n\n^.{1,225}$'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='subject', full_name='cloudEventsProxy.CloudEvent.subject', index=4,
      number=5, type=9, cpp_type=9, label=1,
      has_default_value=False, default_value=_b("").decode('utf-8'),
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='attributes', full_name='cloudEventsProxy.CloudEvent.attributes', index=5,
      number=6, type=11, cpp_type=10, label=1,
      has_default_value=False, default_value=None,
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='data', full_name='cloudEventsProxy.CloudEvent.data', index=6,
      number=7, type=11, cpp_type=10, label=1,
      has_default_value=False, default_value=None,
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=_b('\342\337\037\002 \001'), file=DESCRIPTOR),
    _descriptor.FieldDescriptor(
      name='time', full_name='cloudEventsProxy.CloudEvent.time', index=7,
      number=8, type=11, cpp_type=10, label=1,
      has_default_value=False, default_value=None,
      message_type=None, enum_type=None, containing_type=None,
      is_extension=False, extension_scope=None,
      serialized_options=None, file=DESCRIPTOR),
  ],
  extensions=[
  ],
  nested_types=[],
  enum_types=[
  ],
  serialized_options=None,
  is_extendable=False,
  syntax='proto3',
  extension_ranges=[],
  oneofs=[
  ],
  serialized_start=541,
  serialized_end=839,
)

_CLOUDEVENTINPUT.fields_by_name['attributes'].message_type = google_dot_protobuf_dot_struct__pb2._STRUCT
_CLOUDEVENTINPUT.fields_by_name['data'].message_type = google_dot_protobuf_dot_struct__pb2._STRUCT
_CLOUDEVENT.fields_by_name['attributes'].message_type = google_dot_protobuf_dot_struct__pb2._STRUCT
_CLOUDEVENT.fields_by_name['data'].message_type = google_dot_protobuf_dot_struct__pb2._STRUCT
_CLOUDEVENT.fields_by_name['time'].message_type = google_dot_protobuf_dot_timestamp__pb2._TIMESTAMP
DESCRIPTOR.message_types_by_name['ReceiveRequest'] = _RECEIVEREQUEST
DESCRIPTOR.message_types_by_name['CloudEventInput'] = _CLOUDEVENTINPUT
DESCRIPTOR.message_types_by_name['CloudEvent'] = _CLOUDEVENT
_sym_db.RegisterFileDescriptor(DESCRIPTOR)

ReceiveRequest = _reflection.GeneratedProtocolMessageType('ReceiveRequest', (_message.Message,), dict(
  DESCRIPTOR = _RECEIVEREQUEST,
  __module__ = 'schema_pb2'
  # @@protoc_insertion_point(class_scope:cloudEventsProxy.ReceiveRequest)
  ))
_sym_db.RegisterMessage(ReceiveRequest)

CloudEventInput = _reflection.GeneratedProtocolMessageType('CloudEventInput', (_message.Message,), dict(
  DESCRIPTOR = _CLOUDEVENTINPUT,
  __module__ = 'schema_pb2'
  # @@protoc_insertion_point(class_scope:cloudEventsProxy.CloudEventInput)
  ))
_sym_db.RegisterMessage(CloudEventInput)

CloudEvent = _reflection.GeneratedProtocolMessageType('CloudEvent', (_message.Message,), dict(
  DESCRIPTOR = _CLOUDEVENT,
  __module__ = 'schema_pb2'
  # @@protoc_insertion_point(class_scope:cloudEventsProxy.CloudEvent)
  ))
_sym_db.RegisterMessage(CloudEvent)


DESCRIPTOR._options = None
_RECEIVEREQUEST.fields_by_name['type']._options = None
_CLOUDEVENTINPUT.fields_by_name['specversion']._options = None
_CLOUDEVENTINPUT.fields_by_name['source']._options = None
_CLOUDEVENTINPUT.fields_by_name['type']._options = None
_CLOUDEVENTINPUT.fields_by_name['data']._options = None
_CLOUDEVENT.fields_by_name['specversion']._options = None
_CLOUDEVENT.fields_by_name['id']._options = None
_CLOUDEVENT.fields_by_name['source']._options = None
_CLOUDEVENT.fields_by_name['type']._options = None
_CLOUDEVENT.fields_by_name['data']._options = None

_CLOUDEVENTSSERVICE = _descriptor.ServiceDescriptor(
  name='CloudEventsService',
  full_name='cloudEventsProxy.CloudEventsService',
  file=DESCRIPTOR,
  index=0,
  serialized_options=None,
  serialized_start=842,
  serialized_end=1142,
  methods=[
  _descriptor.MethodDescriptor(
    name='Send',
    full_name='cloudEventsProxy.CloudEventsService.Send',
    index=0,
    containing_service=None,
    input_type=_CLOUDEVENTINPUT,
    output_type=google_dot_protobuf_dot_empty__pb2._EMPTY,
    serialized_options=_b('\202\323\344\223\002\n\"\005/send:\001*'),
  ),
  _descriptor.MethodDescriptor(
    name='Request',
    full_name='cloudEventsProxy.CloudEventsService.Request',
    index=1,
    containing_service=None,
    input_type=_CLOUDEVENTINPUT,
    output_type=_CLOUDEVENT,
    serialized_options=_b('\202\323\344\223\002\r\"\010/request:\001*'),
  ),
  _descriptor.MethodDescriptor(
    name='Receive',
    full_name='cloudEventsProxy.CloudEventsService.Receive',
    index=2,
    containing_service=None,
    input_type=_RECEIVEREQUEST,
    output_type=_CLOUDEVENT,
    serialized_options=_b('\202\323\344\223\002\r\"\010/receive:\001*'),
  ),
])
_sym_db.RegisterServiceDescriptor(_CLOUDEVENTSSERVICE)

DESCRIPTOR.services_by_name['CloudEventsService'] = _CLOUDEVENTSSERVICE

# @@protoc_insertion_point(module_scope)
