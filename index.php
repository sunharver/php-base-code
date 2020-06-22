<?php

require './vendor/autoload.php';

use DataStruct\LinkedList\SingleLinkedList;
use DataStruct\LinkedList\Node;

$singleLinkedList = new SingleLinkedList();
$singleLinkedList->addNode(new Node(4));
$singleLinkedList->addNode(new Node(7));
$singleLinkedList->addNode(new Node(9));
$singleLinkedList->addNode(new Node(2));

$singleLinkedList->getLinkList();





