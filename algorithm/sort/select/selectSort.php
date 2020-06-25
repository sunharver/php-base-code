<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/26
 * Time: 20:03
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
 * 第一次，确定第一个元素为有序数组，之后的数组为待排序数组。第二次则将第二个元素作为最小元素，依次和待排序数组元素比较。
1. 假设待排序的数组前的一个元素为最小值，索引为最小索引。
2. 比较的过程为从前往后，发现更小的值则将假设的最小索引和最小值修改。
3. 最后确定最小索引有无变化，变化则交换这两个值的位置。
 * @param $arr
 */
function selectSort($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len-1; $i++) {
        $minValue = $arr[$i];
        $minIndex = $i;
        for ($j = $i+1; $j < $len; $j++) {
            if ($arr[$j] < $minValue) {
                $minValue = $arr[$j];
                $minIndex = $j;
            }
        }
        if ($minIndex != $i) {
            swap($arr, $i, $minIndex);
        }
    }
    return $arr;
}

$arr = selectSort($arr);
var_dump($arr);