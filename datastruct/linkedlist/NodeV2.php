<?php

namespace DataStruct\LinkedList;

class NodeV2
{
    public $data;
    public $next;

    public function __construct($data = "")
    {
        $this->data = $data;
        $this->next = NULL;
    }

}