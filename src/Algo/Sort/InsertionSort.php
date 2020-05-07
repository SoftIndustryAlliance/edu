<?php

namespace Algo\Sort;

class InsertionSort implements SortInterface
{
    public static function sort(array &$array): bool
    {
        $size = count($array);
        if ($size === 0) {
            return false;
        }

        for ($i=1; $i < $size; $i++) {
            if ($array[$i] < $array[$i-1]) {
                $j = $i;
                while ($j > 0 && $array[$j] < $array[$j-1]) {
                    $tmp = $array[$j];
                    $array[$j] = $array[$j-1];
                    $array[$j-1] = $tmp;
                    $j--;
                }
            }
        }

        return true;
    }
}
