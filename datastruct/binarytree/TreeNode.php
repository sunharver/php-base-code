<?php

namespace DataStruct\BinaryTree;

class TreeNode
{
    public $data = Null;
    public $leftNode = Null;
    public $rightNode = Null;

    public function __construct($data = "", $leftNode = NULL, $rightNode = Null)
    {
        $this->data = $data;
        $this->leftNode = $leftNode;
        $this->rightNode = $rightNode;
    }

}