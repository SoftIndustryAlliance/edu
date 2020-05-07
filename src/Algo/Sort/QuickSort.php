<?php

namespace Algo\Sort;

class QuickSort implements SortInterface
{
    public static function sort(array &$array): bool
    {
        $size = count($array);
        if ($size === 0) {
            return false;
        }

        self::quickSort($array, 0, $size - 1);

        return true;
    }


    private static function quickSort(&$array, int $left, int $right)
    {
        if ($right > $left) {
            $pivot = self::partition($array, $left, $right);

            self::quickSort($array, $left, $pivot - 1);
            self::quickSort($array, $pivot + 1, $right);
        }
    }

    private static function partition(&$array, int $left, int $right): int
    {
        // choose the pivot as last element
        $pivot = $array[$right];

        // init index for elements smaller then pivot
        $indexSmaller = ($left - 1);

        for ($j=$left; $j <= $right-1; $j++) {
            if ($array[$j] < $pivot) {
                // if a number is smaller move it to the beginning
                $indexSmaller++;
                self::swap($array, $indexSmaller, $j);
            }
        }
        // move the pivot after all smaller elements
        self::swap($array, $indexSmaller + 1, $right);

        return $indexSmaller + 1;
    }

    /**
     * Swap elements in array.
     * @param  [type] $array [description]
     * @param  int $from
     * @param  int $to
     */
    private static function swap(&$array, $from, $to)
    {
        $tmp = $array[$from];
        $array[$from] = $array[$to];
        $array[$to] = $tmp;
    }
}
