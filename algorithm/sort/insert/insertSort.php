<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/26
 * Time: 18:31
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
 * 插入排序
 * 从第二个元素开始往前面有序的数组（假设）插入元素，从最后一个元素比较，小于则交换，依次将第二个到最后一个元素往前面插入。
 * @param $arr
 */
function insertSort($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $value = $arr[$i];
        $index = $i;
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($value < $arr[$j]) {
                swap($arr, $index, $j);
                $index = $j;
            } else {
                break;
            }
        }
    }
    return $arr;
}

$arr = insertSort($arr);
var_dump($arr);
