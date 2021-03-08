// Code generated by github.com/99designs/gqlgen, DO NOT EDIT.

package model

import (
	"time"
)

type Cache struct {
	Domain string      `json:"domain"`
	Key    string      `json:"key"`
	Value  interface{} `json:"value"`
	Exp    *time.Time  `json:"exp"`
}

type CacheInput struct {
	Domain string      `json:"domain"`
	Key    string      `json:"key"`
	Value  interface{} `json:"value"`
	Exp    *time.Time  `json:"exp"`
}

type CacheRef struct {
	Domain string `json:"domain"`
	Key    string `json:"key"`
}

type Entity struct {
	Domain string                 `json:"domain"`
	Type   string                 `json:"type"`
	Key    string                 `json:"key"`
	Values map[string]interface{} `json:"values"`
}

type EntityInput struct {
	Domain string                 `json:"domain"`
	Type   string                 `json:"type"`
	Key    string                 `json:"key"`
	Values map[string]interface{} `json:"values"`
}

type EntityRef struct {
	Domain string `json:"domain"`
	Type   string `json:"type"`
	Key    string `json:"key"`
}

type Event struct {
	ID     string                 `json:"id"`
	Entity *Entity                `json:"entity"`
	Method string                 `json:"method"`
	Claims map[string]interface{} `json:"claims"`
	Time   int                    `json:"time"`
}

type EventRef struct {
	Domain string `json:"domain"`
	Type   string `json:"type"`
	Key    string `json:"key"`
	ID     string `json:"id"`
}

type Message struct {
	Domain  string                 `json:"domain"`
	Channel string                 `json:"channel"`
	Type    string                 `json:"type"`
	Body    map[string]interface{} `json:"body"`
}

type Mutex struct {
	Domain string     `json:"domain"`
	Key    string     `json:"key"`
	Exp    *time.Time `json:"exp"`
}

type MutexRef struct {
	Domain string `json:"domain"`
	Key    string `json:"key"`
}

type PeerMessage struct {
	ID      string                 `json:"id"`
	Domain  string                 `json:"domain"`
	Channel string                 `json:"channel"`
	Type    string                 `json:"type"`
	Body    map[string]interface{} `json:"body"`
	Claims  map[string]interface{} `json:"claims"`
	Time    int                    `json:"time"`
}

type SearchEntityOpts struct {
	Domain      string  `json:"domain"`
	Type        string  `json:"type"`
	QueryString *string `json:"query_string"`
	Limit       int     `json:"limit"`
	Offset      *int    `json:"offset"`
	Sort        *Sort   `json:"sort"`
}

type SearchEventOpts struct {
	Domain      string  `json:"domain"`
	Type        string  `json:"type"`
	QueryString *string `json:"query_string"`
	Limit       int     `json:"limit"`
	Min         *int    `json:"min"`
	Max         *int    `json:"max"`
	Offset      *int    `json:"offset"`
	Sort        *Sort   `json:"sort"`
}

type Sort struct {
	Field   string `json:"field"`
	Reverse *bool  `json:"reverse"`
}

type StreamEventOpts struct {
	Domain        string  `json:"domain"`
	Type          string  `json:"type"`
	ConsumerGroup *string `json:"consumer_group"`
}

type StreamMessageOpts struct {
	Domain        string  `json:"domain"`
	Channel       string  `json:"channel"`
	Type          string  `json:"type"`
	ConsumerGroup *string `json:"consumer_group"`
}
