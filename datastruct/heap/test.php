<?php

require "../../vendor/autoload.php";

use DataStruct\Heap\BinaryHeap;

//$arr = [6, 2, 5, 1, 7, 9, 3, 4, 8];
$arr = [11, 5, 10, 8, 7, 9, 3, 4, 1];
$heap = new BinaryHeap($arr, false);
$layer = $heap->getHeapLayer();
echo "that binary heap layer:{$layer}\n";
$heap->printBinaryHeap();

// 二叉树 -> 堆
$heap->heapify();
$heap->printBinaryHeap();

// 堆排序
$heap->heapSort();
$heap->printBinaryHeap();

// 先序遍历
$heap->preOrderTraveral(0);
echo "\n";
// 中序遍历
$heap->inOrderTraveral(0);
echo "\n";
// 后序遍历
$heap->postOrderTraveral(0);

// 添加元素
//$heap->addChildren(2);
//$heap->printBinaryHeap();
//$heap->addChildren(6);
//$heap->printBinaryHeap();