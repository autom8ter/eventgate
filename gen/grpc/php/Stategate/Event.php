<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

namespace Stategate;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Event is primitive that represents a single state change to an entity
 * Events are persisted to history & broadcasted to interested consumers(Stream) any time an entity is created/modified/deleted
 * Events are immutable after creation and may be searched.
 * EventService client's may search events to query previous state of an entity(s)
 *
 * Generated from protobuf message <code>stategate.Event</code>
 */
class Event extends \Google\Protobuf\Internal\Message
{
    /**
     * identifies the event(uuid v4).
     *
     * Generated from protobuf field <code>string id = 1 [(.validator.field) = {</code>
     */
    private $id = '';
    /**
     * state of an Entity after it has been mutated
     *
     * Generated from protobuf field <code>.stategate.Entity entity = 2 [(.validator.field) = {</code>
     */
    private $entity = null;
    /**
     * the invoked method that triggered the event
     *
     * Generated from protobuf field <code>string method = 5 [(.validator.field) = {</code>
     */
    private $method = '';
    /**
     * the authentication claims of the event producer.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct claims = 3 [(.validator.field) = {</code>
     */
    private $claims = null;
    /**
     * timestamp(ns) of when the event was received.
     *
     * Generated from protobuf field <code>int64 time = 4 [(.validator.field) = {</code>
     */
    private $time = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           identifies the event(uuid v4).
     *     @type \Stategate\Entity $entity
     *           state of an Entity after it has been mutated
     *     @type string $method
     *           the invoked method that triggered the event
     *     @type \Google\Protobuf\Struct $claims
     *           the authentication claims of the event producer.
     *     @type int|string $time
     *           timestamp(ns) of when the event was received.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schema::initOnce();
        parent::__construct($data);
    }

    /**
     * identifies the event(uuid v4).
     *
     * Generated from protobuf field <code>string id = 1 [(.validator.field) = {</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * identifies the event(uuid v4).
     *
     * Generated from protobuf field <code>string id = 1 [(.validator.field) = {</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * state of an Entity after it has been mutated
     *
     * Generated from protobuf field <code>.stategate.Entity entity = 2 [(.validator.field) = {</code>
     * @return \Stategate\Entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * state of an Entity after it has been mutated
     *
     * Generated from protobuf field <code>.stategate.Entity entity = 2 [(.validator.field) = {</code>
     * @param \Stategate\Entity $var
     * @return $this
     */
    public function setEntity($var)
    {
        GPBUtil::checkMessage($var, \Stategate\Entity::class);
        $this->entity = $var;

        return $this;
    }

    /**
     * the invoked method that triggered the event
     *
     * Generated from protobuf field <code>string method = 5 [(.validator.field) = {</code>
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * the invoked method that triggered the event
     *
     * Generated from protobuf field <code>string method = 5 [(.validator.field) = {</code>
     * @param string $var
     * @return $this
     */
    public function setMethod($var)
    {
        GPBUtil::checkString($var, True);
        $this->method = $var;

        return $this;
    }

    /**
     * the authentication claims of the event producer.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct claims = 3 [(.validator.field) = {</code>
     * @return \Google\Protobuf\Struct
     */
    public function getClaims()
    {
        return $this->claims;
    }

    /**
     * the authentication claims of the event producer.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct claims = 3 [(.validator.field) = {</code>
     * @param \Google\Protobuf\Struct $var
     * @return $this
     */
    public function setClaims($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Struct::class);
        $this->claims = $var;

        return $this;
    }

    /**
     * timestamp(ns) of when the event was received.
     *
     * Generated from protobuf field <code>int64 time = 4 [(.validator.field) = {</code>
     * @return int|string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * timestamp(ns) of when the event was received.
     *
     * Generated from protobuf field <code>int64 time = 4 [(.validator.field) = {</code>
     * @param int|string $var
     * @return $this
     */
    public function setTime($var)
    {
        GPBUtil::checkInt64($var);
        $this->time = $var;

        return $this;
    }

}

