<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/26
 * Time: 20:30
 */

$arr = [5, 3, 7, 2, 78, 12, 6, 99, 8];
/**
 * 交换数组中两个位置的值
 * @param $arr
 * @param $i
 * @param $j
 */
function swap(&$arr, $i, $j)
{
    $temp = $arr[$j];
    $arr[$j] = $arr[$i];
    $arr[$i] = $temp;
}

/**
 * 选择排序
 * 快速排序整体看做一个待排序数组，将第一个元素作为比较值，小于的分到一个数组，大于该值分到另一个数组，在递归的处理这两个数组。
1. 递归的条件为元素个数大于1
2. 分别对小于数组和大于数组做递归调用。
3. 将结果merge。
 * @param $arr
 */
function quickSort($arr)
{
    $len = count($arr);
    if ($len > 1) {
        $midValue = $arr[0];
        $smallArr = [];
        $bigArr = [];
        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $midValue) {
                $smallArr[] = $arr[$i];
            } else {
                $bigArr[] = $arr[$i];
            }
        }
        return array_merge(quickSort($smallArr), [$midValue], quickSort($bigArr));
    } else {
        return $arr;
    }
}

$arr = quickSort($arr);
var_dump($arr);