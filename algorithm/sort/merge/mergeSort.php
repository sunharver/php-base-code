<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/27
 * Time: 0:49
 */

$arr = [5, 3, 7, 2, 78, 12, 6, 99, 8];

/**
 * 归并排序
 * 利用递归与分治技术将数据序列划分成越来越小的子表，再对子集进行排序
 * @param $arr
 */
function mergeSort($arr)
{
    if (count($arr) < 2) {
        return $arr;
    }
    $midIndex = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $midIndex);
    $right = array_slice($arr, $midIndex);
    return merge(mergeSort($left), mergeSort($right));
}

function merge($left, $right)
{
    $result = [];
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            array_push($result, array_shift($left));
        } else {
            array_push($result, array_shift($right));
        }
    }

    while (count($left)) {
        array_push($result, array_shift($left));
    }
    while (count($right)) {
        array_push($result, array_shift($right));
    }
    return $result;
}

$arr = mergeSort($arr);
var_dump($arr);