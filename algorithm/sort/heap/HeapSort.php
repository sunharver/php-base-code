<?php

/**
 * 堆排序步骤
 * 1. 将待排序数组生成一个堆
 * 2. 进过一次堆化过程，堆顶元素为最大值（最小值）（假设我们对数组进行升序排列）
 * 3. 删除堆顶元素，将最后一个元素替代，再执行一次堆化过程
 * 4. 直到只剩一个元素位置
 * 数据结构已经实现了，这里直接使用
 */

namespace Sort\Heap;

class HeapSort
{

    // 数组存储
    private $heap = [];
    // 堆类型 默认 true = 大根堆
    private $HeapType = true;

    public function __construct($heap, $heapType = true)
    {
        $this->heap = $heap;
        $this->HeapType = $heapType;
    }

    /**
     * 获取二叉堆的层数
     */
    public function getHeapLayer()
    {
        $layer = 0;
        $lastIndex = count($this->heap) - 1;
        while ($lastIndex >= 0) {
            $layer++;
            if ($lastIndex == 0){
                break;
            }
            if ($lastIndex % 2 == 0) { // 右
                $parentIndex = ($lastIndex - 2) / 2;
            } else {
                $parentIndex = ($lastIndex - 1) / 2;
            }
            $lastIndex = $parentIndex;
        }
        return $layer;
    }

    /**
     * 获取某个节点的父节点 0 表示最后一个节点父节点
     * @param $index
     * @return index
     */
    public function getParentIxByNode($index = 0)
    {
        return $index == 0
            ? floor((count($this->heap) / 2) - 1)
            : floor((($index + 1) / 2) - 1);
    }

    /**
     * 打印二叉堆
     */
    public function printBinaryHeap()
    {
        $layer = $this->getHeapLayer();
        $str = "--";
        $index = 0;
        for ($i = 1; $i <= $layer; $i++) {
            if (!isset($this->heap[$index])) {
                break;
            }
            // 每一层逻辑
            $leftUnit = pow(2, ($layer - $i));
            $sepUnit = pow(2, ($layer - $i + 1));
            $nodeNum = pow(2, ($i - 1));
            echo str_repeat($str, $leftUnit);
            if ($index == 0) {
                $sepUnit = $leftUnit;
            }
            while ($nodeNum >= 1) {
                if (!isset($this->heap[$index])) {
                    break;
                }
                // 每一个元素
                echo $this->heap[$index];
                echo str_repeat($str, $sepUnit);
                $index++;
                $nodeNum--;
            }
            echo "\n";
        }
        echo "\n";
    }


    /**
     * 下层
     * 1. 针对所有非叶子节点操作
     * @param $array 待处理的数组
     * @param $index 待处理的索引
     * @param $scope 处理的范围，0-无范围 比较的时候超过范围就不比较了（避免已经有序的被打乱）
     */
    private function downAdjust(&$array, $index, $scope = 0)
    {
        $leftData = $array[2 * $index + 1];
        $rightData = $array[2 * $index + 2];
        // 大根堆取最大值 父节点小于最大值交换
        // 小根堆取最小值 父节点大于最小值交换
        $leftIndex = 2 * $index + 1;
        $rightIndex = 2 * $index + 2;
        $heapType = $this->HeapType;

        if ($scope == 0 || ($scope > 0 && $leftIndex <= $scope && $rightIndex <= $scope)) {
            $compValue = $leftData > $rightData
                ? ($heapType ? $leftData : $rightData)
                : ($heapType ? $rightData : $leftData);
            $compIndex = $leftData > $rightData
                ? ($heapType ? $leftIndex : $rightIndex)
                : ($heapType ? $rightIndex : $leftIndex);
            // 大根堆交换条件
            if (($heapType && $array[$index] < $compValue) || (!$heapType && $array[$index] > $compValue)) {
                $temp = $array[$index];
                $array[$index] = $array[$compIndex];
                $array[$compIndex] = $temp;
            }
        } elseif ($scope > 0 && $leftIndex <= $scope && $rightIndex > $scope) {
            if (($this->HeapType && $array[$leftIndex] > $array[$index])
                || (!$this->HeapType && $array[$leftIndex] < $array[$index])) {
                $temp = $array[$index];
                $array[$index] = $array[$leftIndex];
                $array[$leftIndex] = $temp;
            }
        }

    }

    /**
     * 调整二叉树为堆
     */
    public function heapify($scope = 0)
    {
        $arr = $this->heap;
        $lastParentIndex = $this->getParentIxByNode($scope);
        for ($i = $lastParentIndex; $i >= 0; $i--) {
            $this->downAdjust($this->heap, $i, $scope);
        }
    }


    /**
     * 上浮
     * 1. 添加节点到数组末尾
     * 2. 分别与父节点的数值比较，看情况交换位置
     * @param $array
     * @param $data
     */
    private function upAdjust(&$array, $data)
    {
        $length = count($array);
        $lastNodeIndex = $length - 1;
        while ($lastNodeIndex > 0) {
            // 确认其父节点的索引
            if ($lastNodeIndex % 2 == 0) {
                // 右节点
                $parentNodeIndex = ($lastNodeIndex - 2) / 2;
            } else {
                // 左节点
                $parentNodeIndex = ($lastNodeIndex - 1) / 2;
            }
            if (($this->HeapType && $data > $array[$parentNodeIndex])
                || (!$this->HeapType && $data < $array[$parentNodeIndex])) {
                $temp = $array[$parentNodeIndex];
                $array[$parentNodeIndex] = $data;
                $array[$lastNodeIndex] = $temp;
                $lastNodeIndex = $parentNodeIndex;
            } else {
                break;
            }
        }
    }


    /**
     * 添加数据到堆
     * @param $data
     */
    public function addChildren($data)
    {
        array_push($this->heap, $data);
        $this->upAdjust($this->heap, $data);
    }


    /**
     * 堆排序
     */
    public function heapSort()
    {
        $length = count($this->heap);
        for ($i = $length - 1; $i > 0; $i--) {
            // 交换第一个数和最后一个数 使得最后一个为最大值（升序）
            $temp = $this->heap[0];
            $this->heap[0] = $this->heap[$i];
            $this->heap[$i] = $temp;
            if ($i == 1) {break;}
            $parentIndex = $this->getParentIxByNode($i - 1);
            while ($parentIndex >= 0) {
                $this->downAdjust($this->heap, $parentIndex, $i - 1);
                $parentIndex--;
            }
        }
    }


    /**
     * 先序遍历
     * @param $index
     */
    public function preOrderTraveral($index)
    {
        echo $this->heap[$index] . " ";
        $leftIndex = 2 * $index + 1;
        $rightIndex = 2 * $index + 2;
        if (isset($this->heap[$leftIndex])) {
            $this->preOrderTraveral($leftIndex);
        }
        if (isset($this->heap[$rightIndex])) {
            $this->preOrderTraveral($rightIndex);
        }
    }


    /**
     * 中序遍历
     * @param $index
     */
    public function inOrderTraveral($index)
    {
        $leftIndex = 2 * $index + 1;
        $rightIndex = 2 * $index + 2;
        if (isset($this->heap[$leftIndex])) {
            $this->inOrderTraveral($leftIndex);
        }
        echo $this->heap[$index] . " ";
        if (isset($this->heap[$rightIndex])) {
            $this->inOrderTraveral($rightIndex);
        }
    }

    /**
     * 后序遍历
     * @param $index
     */
    public function postOrderTraveral($index)
    {
        $leftIndex = 2 * $index + 1;
        $rightIndex = 2 * $index + 2;
        if (isset($this->heap[$leftIndex])) {
            $this->postOrderTraveral($leftIndex);
        }
        if (isset($this->heap[$rightIndex])) {
            $this->postOrderTraveral($rightIndex);
        }
        echo $this->heap[$index] . " ";
    }


}
