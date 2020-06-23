<?php

/**
 * 合并两个有序链表后依然有序
 * 核心：
 * 1. 确定第一个节点最小的为头结点
 * 2. 确定两个链表遍历的开始位置，（小的从第二个节点开始遍历，因为头结点和第一个节点已经用了）
 * 3. 使用一个临时变量存储节点，在下一次遍历时使用其指向当前节点形成链表
 */

require "../../vendor/autoload.php";

use DataStruct\LinkedList\SingleLinkedListV2;

$linked1 = new SingleLinkedListV2();
$linked1->addNode(1);
$linked1->addNode(3);
$linked1->addNode(5);
$linked1->addNode(7);
$linked1->addNode(9);

$linked1->getLinkedNode();

$linked2 = new SingleLinkedListV2();
$linked2->addNode(2);
$linked2->addNode(4);
$linked2->addNode(6);

$linked2->getLinkedNode();

function mergeLinked(SingleLinkedListV2 $linked1, SingleLinkedListV2 $linked2)
{
    $header1 = $linked1->header;
    $header2 = $linked2->header;
    if ($header1 == NULL || $header1->next == NULL) {
        if ($header2 == NULL || $header2->next == NULL) {
            return "that two linkedlist either empty!\n";
        } else {
            return $header2;
        }
    } else {
        if ($header2 == NULL || $header2->next == NULL) {
            return $header1;
        }
    }

    $header = NULL; // 新链表 head
    $cur1 = NULL; // 链表1 用于遍历的节点
    $cur2 = NULL; // 链表2 用于遍历的节点
    // 比较第一个节点 确定使用哪个链表的 header
    if ($header1->next->data < $header2->next->data) {
        $cur1 = $header1->next->next;
        $header1->next->next = NULL;
        $header = $header1;
        $cur2 = $header2->next;
    } else {
        $cur2 = $header2->next->next;
        $header2->next->next = NULL;
        $header = $header2;
        $cur1 = $header1->next;
    }
    // header 第一个节点
    $headTmp = $header->next;
    while ($cur1 && $cur2) {
        if ($cur1->data < $cur2->data) {
            $headTmp->next = $cur1;
            $headTmp = $cur1;
            $cur1 = $cur1->next;
        } else {
            $headTmp->next = $cur2;
            $headTmp = $cur2;
            $cur2 = $cur2->next;
        }
    }

    if ($cur1) {
        $headTmp->next = $cur1;
    }

    if ($cur2) {
        $headTmp->next = $cur2;
    }

    return $header;
}

$header3 = mergeLinked($linked1, $linked2);
$cur = $header3->next;
while ($cur) {
    echo "{$cur->data} ";
    $cur = $cur->next;
}









