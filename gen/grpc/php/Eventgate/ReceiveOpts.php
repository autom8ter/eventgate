<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

namespace Eventgate;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ReceiveOpts filters events before they are received by a consumer
 *
 * Generated from protobuf message <code>eventgate.ReceiveOpts</code>
 */
class ReceiveOpts extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string channel = 1 [(.validator.field) = {</code>
     */
    private $channel = '';
    /**
     * Generated from protobuf field <code>string consumer_group = 2;</code>
     */
    private $consumer_group = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $channel
     *     @type string $consumer_group
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schema::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string channel = 1 [(.validator.field) = {</code>
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Generated from protobuf field <code>string channel = 1 [(.validator.field) = {</code>
     * @param string $var
     * @return $this
     */
    public function setChannel($var)
    {
        GPBUtil::checkString($var, True);
        $this->channel = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string consumer_group = 2;</code>
     * @return string
     */
    public function getConsumerGroup()
    {
        return $this->consumer_group;
    }

    /**
     * Generated from protobuf field <code>string consumer_group = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setConsumerGroup($var)
    {
        GPBUtil::checkString($var, True);
        $this->consumer_group = $var;

        return $this;
    }

}
