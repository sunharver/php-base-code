<?php

/**
 * 合并两个有序链表后依然有序
 * 核心：创建一个新链表存储最后数据，遍历两个链表 小的添加到新链表 剩下如果没有遍历完的都添加到新链表
 */

require "../../vendor/autoload.php";

use DataStruct\LinkedList\SingleLinkedListV2;

// 创建链表1
$linked1 = new SingleLinkedListV2();
for ($i = 1; $i < 10; $i+=2) {
    $linked1->addNode($i);
}
$linked1->getLinkedNode();

// 创建链表2
$linked2 = new SingleLinkedListV2();
for ($i = 2; $i < 20; $i+=2) {
    $linked2->addNode($i);
}
$linked2->getLinkedNode();

// 创建最后输出的 链表3
$linked3 = new SingleLinkedListV2();


// 合并两个链表
$cur1 = $linked1->header->next;
$cur2 = $linked2->header->next;

while ($cur1 && $cur2) {
    if ($cur1->data < $cur2->data) {
        $linked3->addNode($cur1->data);
        $cur1 = $cur1->next;
    } else {
        $linked3->addNode($cur2->data);
        $cur2 = $cur2->next;
    }
}

if ($cur1) {
    while ($cur1 != NULL) {
        $linked3->addNode($cur1->data);
        $cur1 = $cur1->next;
    }
}

if ($cur2) {
    while ($cur2 != NULL) {
        $linked3->addNode($cur2->data);
        $cur2 = $cur2->next;
    }
}

$linked3->getLinkedNode();










