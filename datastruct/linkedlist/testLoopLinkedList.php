<?php

require "../../vendor/autoload.php";

//$linkedList = new \DataStruct\LinkedList\SingleLinkedListV2();


//$linkedList = new \DataStruct\LinkedList\NodeV2();
//$linkedList->next = NULL;

$linkedList = new \DataStruct\LinkedList\NodeV2();
$linkedList->next = Null;
$tmp = $linkedList;

$node1 = new \DataStruct\LinkedList\NodeV2(1);
$tmp->next = $node1;
// 用于存储当前加入的节点  在下一次加入节点的时候使用
$tmp = $node1;

$node2 = new \DataStruct\LinkedList\NodeV2(2);
$tmp->next = $node2;
$tmp = $node2;

$node3 = new \DataStruct\LinkedList\NodeV2(3);
$tmp->next = $node3;
$tmp = $node3;

$node4 = new \DataStruct\LinkedList\NodeV2(4);
$tmp->next = $node4;
$tmp = $node4;

$node5 = new \DataStruct\LinkedList\NodeV2(5);
$tmp->next = $node5;
$node5->next = $node3;

var_dump($linkedList);
