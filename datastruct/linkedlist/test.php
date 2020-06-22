<?php

require "../../vendor/autoload.php";

use DataStruct\LinkedList\SingleLinkedList;
use DataStruct\LinkedList\Node;
use DataStruct\LinkedList\SingleLinkedListV2;
use DataStruct\LinkedList\NodeV2;

// linked list v2

$linkedList = new SingleLinkedListV2();
$linkedList->addNode(2);
$linkedList->addNode(7);
$linkedList->addNode(5);
$linkedList->addNode(1);
$linkedList->getLinkedNode();

//$singleLinkedList = new SingleLinkedList();
//$singleLinkedList->addNode(new Node(4));
//$singleLinkedList->addNode(new Node(7));
//$singleLinkedList->addNode(new Node(9));
//$singleLinkedList->addNode(new Node(3));
//$singleLinkedList->addNode(new Node(9));
//$singleLinkedList->addNode(new Node(5));
// 打印链表
//$singleLinkedList->getLinkList();
//$singleLinkedList->getLinkListV2();
////$singleLinkedList->delNodeV2(9);
//$singleLinkedList->reverseV2();
//$singleLinkedList->getLinkListV2();
//$singleLinkedList->getLinkList();
// 删除节点
//$singleLinkedList->delNode(7);
// 打印
//$singleLinkedList->getLinkList();
// 逆序
//$singleLinkedList->reverse();
// 移除重复的节点
//$singleLinkedList->removeRepeatNode();
//$singleLinkedList->getLinkList();
// 查找倒数第k个节点
//$singleLinkedList->getBackKeyNum(1);
// 打印链表
//$singleLinkedList->getLinkListNode();

//$linked1 = new SingleLinkedList();
//$linked1->addNode(new Node(1));
//$linked1->addNode(new Node(3));
//$linked1->addNode(new Node(5));
//$linked1->addNode(new Node(7));
//$linked1->addNode(new Node(9));
//$linked1->getLinkList();
//
//$linked2 = new SingleLinkedList();
//$linked2->addNode(new Node(2));
//$linked2->addNode(new Node(4));
//$linked2->addNode(new Node(6));
//$linked2->addNode(new Node(8));
//$linked2->addNode(new Node(10));
//$linked2->getLinkList();
//
//$linked3 = new SingleLinkedList();
//$linked3->mergeLinked($linked1, $linked2);
//$linked3->getLinkList();



