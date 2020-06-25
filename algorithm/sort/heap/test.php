<?php

require "../../vendor/autoload.php";

use Sort\Heap\HeapSort;

$arr = [11, 5, 10, 8, 7, 9, 3, 4, 1];

$sortHeap = new HeapSort($arr, true);
$sortHeap->printBinaryHeap();
// 变堆
$sortHeap->heapify();
$sortHeap->printBinaryHeap();
// 堆排序
$sortHeap->heapSort();
$sortHeap->printBinaryHeap();