<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/26
 * Time: 14:55
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
 * 冒泡排序
 * 从第一个数开始，比较第一个数和第二个数据的大小，顺序不对则交换，这样一次比较到最后的数字，这样的一趟比较可以得到一个最大值放在最后一位，通过一趟排序可以得到一个最大值，那么 N 个数字的排序需要 N-1 趟排序。
 * @param $arr
 */
function bubble($arr)
{
    $len = count($arr);
    for ($i = 1; $i <= $len; $i++) {
        for ($j = 0; $j <= $len - 1 - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                swap($arr, $j, $j + 1);
            }
        }
    }
    return $arr;
}

$arr = bubble($arr);
var_dump($arr);
