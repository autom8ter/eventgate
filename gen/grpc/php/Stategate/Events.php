<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

namespace Stategate;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Events is an array of events
 *
 * Generated from protobuf message <code>stategate.Events</code>
 */
class Events extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .stategate.Event events = 1;</code>
     */
    private $events;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Stategate\Event[]|\Google\Protobuf\Internal\RepeatedField $events
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schema::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .stategate.Event events = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Generated from protobuf field <code>repeated .stategate.Event events = 1;</code>
     * @param \Stategate\Event[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEvents($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Stategate\Event::class);
        $this->events = $arr;

        return $this;
    }

}

