<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema.proto

namespace Stategate;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * SearchObjectOpts are options when querying historical events for a given object
 *
 * Generated from protobuf message <code>stategate.SearchObjectOpts</code>
 */
class SearchObjectOpts extends \Google\Protobuf\Internal\Message
{
    /**
     * the object's tenant(ex: acme)
     *
     * Generated from protobuf field <code>string tenant = 1 [(.validator.field) = {</code>
     */
    private $tenant = '';
    /**
     * Object type (ex: user)
     *
     * Generated from protobuf field <code>string type = 2 [(.validator.field) = {</code>
     */
    private $type = '';
    /**
     * json string to filter records that have values match k/v pairs ex: { "message": "hello world" }
     *
     * Generated from protobuf field <code>string query_string = 3;</code>
     */
    private $query_string = '';
    /**
     * limit returned objects
     *
     * Generated from protobuf field <code>int64 limit = 4 [(.validator.field) = {</code>
     */
    private $limit = 0;
    /**
     * offset returned events(pagination)
     *
     * Generated from protobuf field <code>int64 offset = 5;</code>
     */
    private $offset = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $tenant
     *           the object's tenant(ex: acme)
     *     @type string $type
     *           Object type (ex: user)
     *     @type string $query_string
     *           json string to filter records that have values match k/v pairs ex: { "message": "hello world" }
     *     @type int|string $limit
     *           limit returned objects
     *     @type int|string $offset
     *           offset returned events(pagination)
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schema::initOnce();
        parent::__construct($data);
    }

    /**
     * the object's tenant(ex: acme)
     *
     * Generated from protobuf field <code>string tenant = 1 [(.validator.field) = {</code>
     * @return string
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    /**
     * the object's tenant(ex: acme)
     *
     * Generated from protobuf field <code>string tenant = 1 [(.validator.field) = {</code>
     * @param string $var
     * @return $this
     */
    public function setTenant($var)
    {
        GPBUtil::checkString($var, True);
        $this->tenant = $var;

        return $this;
    }

    /**
     * Object type (ex: user)
     *
     * Generated from protobuf field <code>string type = 2 [(.validator.field) = {</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Object type (ex: user)
     *
     * Generated from protobuf field <code>string type = 2 [(.validator.field) = {</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * json string to filter records that have values match k/v pairs ex: { "message": "hello world" }
     *
     * Generated from protobuf field <code>string query_string = 3;</code>
     * @return string
     */
    public function getQueryString()
    {
        return $this->query_string;
    }

    /**
     * json string to filter records that have values match k/v pairs ex: { "message": "hello world" }
     *
     * Generated from protobuf field <code>string query_string = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setQueryString($var)
    {
        GPBUtil::checkString($var, True);
        $this->query_string = $var;

        return $this;
    }

    /**
     * limit returned objects
     *
     * Generated from protobuf field <code>int64 limit = 4 [(.validator.field) = {</code>
     * @return int|string
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * limit returned objects
     *
     * Generated from protobuf field <code>int64 limit = 4 [(.validator.field) = {</code>
     * @param int|string $var
     * @return $this
     */
    public function setLimit($var)
    {
        GPBUtil::checkInt64($var);
        $this->limit = $var;

        return $this;
    }

    /**
     * offset returned events(pagination)
     *
     * Generated from protobuf field <code>int64 offset = 5;</code>
     * @return int|string
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * offset returned events(pagination)
     *
     * Generated from protobuf field <code>int64 offset = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkInt64($var);
        $this->offset = $var;

        return $this;
    }

}

