<?php

namespace Algo\Sort;

class MergeSort implements SortInterface
{
    public static function sort(array &$array): bool
    {
        $size = count($array);
        if ($size === 0) {
            return false;
        }

        self::mergeSort($array, 0, $size - 1);

        return true;
    }


    private static function mergeSort(&$array, int $left, int $right)
    {
        if ($right > $left) {
            $middle = $left + intval(($right - $left)/2);
            self::mergeSort($array, $left, $middle);
            self::mergeSort($array, $middle+1, $right);

            self::merge($array, $left, $middle, $right);
        }
    }

    private static function merge(&$array, int $left, int $middle, int $right)
    {
        // determine left and right sub-array sizes
        $sizeLeft = $middle - $left + 1;
        $sizeRight = $right - $middle;

        // copy left sub-array to a temporary array
        $tmpLeft = [];
        for ($i=0; $i < $sizeLeft; $i++) {
            $tmpLeft[] = $array[$left + $i];
        }
        // copy right sub-array to a temporary array
        $tmpRight = [];
        for ($i=0; $i < $sizeRight; $i++) {
            $tmpRight[] = $array[$middle + 1 + $i];
        }

        $leftIndex = 0; //index in the left temporary array
        $rightIndex = 0; //index in the right temporary array
        $mainIndex = $left; // index in the main array that's been sorted

        // walk through sub-arrays and copy smallest numnbers in order
        while ($leftIndex < $sizeLeft && $rightIndex < $sizeRight) {
            if ($tmpLeft[$leftIndex] < $tmpRight[$rightIndex]) {
                //copy from left array
                $array[$mainIndex] = $tmpLeft[$leftIndex];
                $leftIndex++;
                $mainIndex++;
                continue;
            }
            //copy from right array
            $array[$mainIndex] = $tmpRight[$rightIndex];
            $rightIndex++;
            $mainIndex++;
        }

        // copy what's left from the left array
        while ($leftIndex < $sizeLeft) {
            $array[$mainIndex] = $tmpLeft[$leftIndex];
            $leftIndex++;
            $mainIndex++;
        }

        // copy what's left from the right array
        while ($rightIndex < $sizeRight) {
            $array[$mainIndex] = $tmpRight[$rightIndex];
            $rightIndex++;
            $mainIndex++;
        }
    }
}
