<?php

namespace Algo\Sort;

class SelectionSort implements SortInterface
{
    public static function sort(array &$array): bool
    {
        $size = count($array);
        if ($size === 0) {
            return false;
        }

        for ($i=0; $i < $size; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $size; $j++) {
                if ($array[$j] < $array[$minIndex]) {
                    $minIndex = $j;
                }
            }
            $tmp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $tmp;
        }
        return true;
    }
}
