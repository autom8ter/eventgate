<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

namespace GPBMetadata;

class Schema
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\GithubCom\Mwitkow\GoProtoValidators\Validator::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0aa00d0a0c736368656d612e70726f746f12097374617465676174651a1c" .
            "676f6f676c652f70726f746f6275662f7374727563742e70726f746f1a1f" .
            "676f6f676c652f70726f746f6275662f74696d657374616d702e70726f74" .
            "6f1a19676f6f676c652f70726f746f6275662f616e792e70726f746f1a1b" .
            "676f6f676c652f70726f746f6275662f656d7074792e70726f746f1a3667" .
            "69746875622e636f6d2f6d7769746b6f772f676f2d70726f746f2d76616c" .
            "696461746f72732f76616c696461746f722e70726f746f225d0a094f626a" .
            "656374526566121b0a0674656e616e74180120012809420be2df1f070a05" .
            "5e5c532b2412190a0474797065180220012809420be2df1f070a055e5c53" .
            "2b2412180a036b6579180320012809420be2df1f070a055e5c532b24228b" .
            "010a064f626a656374121b0a0674656e616e74180120012809420be2df1f" .
            "070a055e5c532b2412190a0474797065180220012809420be2df1f070a05" .
            "5e5c532b2412180a036b6579180320012809420be2df1f070a055e5c532b" .
            "24122f0a0676616c75657318042001280b32172e676f6f676c652e70726f" .
            "746f6275662e5374727563744206e2df1f022001222d0a074f626a656374" .
            "7312220a076f626a6563747318012003280b32112e737461746567617465" .
            "2e4f626a65637422a0010a105365617263684f626a6563744f707473121b" .
            "0a0674656e616e74180120012809420be2df1f070a055e5c532b2412190a" .
            "0474797065180220012809420be2df1f070a055e5c532b24122d0a0c6d61" .
            "7463685f76616c75657318032001280b32172e676f6f676c652e70726f74" .
            "6f6275662e53747275637412150a056c696d69741804200128034206e2df" .
            "1f021000120e0a066f66667365741805200128032297010a0f5365617263" .
            "684576656e744f707473121b0a0674656e616e74180120012809420be2df" .
            "1f070a055e5c532b2412190a0474797065180220012809420be2df1f070a" .
            "055e5c532b24120b0a036b6579180320012809120b0a036d696e18042001" .
            "2803120b0a036d617818052001280312150a056c696d6974180620012803" .
            "4206e2df1f021000120e0a066f666673657418072001280322440a0a5374" .
            "7265616d4f707473121b0a0674656e616e74180120012809420be2df1f07" .
            "0a055e5c532b2412190a0474797065180220012809420be2df1f070a055e" .
            "5c532b24228e010a054576656e7412130a0269641801200128094207e2df" .
            "1f0390010012290a066f626a65637418022001280b32112e737461746567" .
            "6174652e4f626a6563744206e2df1f022001122f0a06636c61696d731803" .
            "2001280b32172e676f6f676c652e70726f746f6275662e53747275637442" .
            "06e2df1f02200112140a0474696d651804200128034206e2df1f02100022" .
            "2a0a064576656e747312200a066576656e747318012003280b32102e7374" .
            "617465676174652e4576656e7432e4040a10537461746547617465536572" .
            "7669636512600a095365744f626a65637412112e7374617465676174652e" .
            "4f626a6563741a162e676f6f676c652e70726f746f6275662e456d707479" .
            "222882d3e493022222202f6170692f7b74656e616e747d2f7b747970657d" .
            "2f73746174652f7b6b65797d125e0a094765744f626a65637412142e7374" .
            "617465676174652e4f626a6563745265661a112e7374617465676174652e" .
            "4f626a656374222882d3e493022212202f6170692f7b74656e616e747d2f" .
            "7b747970657d2f73746174652f7b6b65797d12640a0d5365617263684f62" .
            "6a65637473121b2e7374617465676174652e5365617263684f626a656374" .
            "4f7074731a122e7374617465676174652e4f626a65637473222282d3e493" .
            "021c121a2f6170692f7b74656e616e747d2f7b747970657d2f7374617465" .
            "125d0a0944656c4f626a65637412142e7374617465676174652e4f626a65" .
            "63745265661a162e676f6f676c652e70726f746f6275662e456d70747922" .
            "2282d3e493021c2a1a2f6170692f7b74656e616e747d2f7b747970657d2f" .
            "737461746512650a0c53747265616d4576656e747312152e737461746567" .
            "6174652e53747265616d4f7074731a102e7374617465676174652e457665" .
            "6e74222a82d3e493022412222f6170692f7b74656e616e747d2f7b747970" .
            "657d2f6576656e74732f73747265616d300112620a0c5365617263684576" .
            "656e7473121a2e7374617465676174652e5365617263684576656e744f70" .
            "74731a112e7374617465676174652e4576656e7473222382d3e493021d12" .
            "1b2f6170692f7b74656e616e747d2f7b747970657d2f6576656e7473420b" .
            "5a09737461746567617465620670726f746f33"
        ));

        static::$is_initialized = true;
    }
}

