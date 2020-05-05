<?php

namespace Algo\Sort;

class BubbleSort implements SortInterface
{
    public static function sort(array &$array): bool
    {
        $size = count($array);
        if ($size === 0) {
            return false;
        }

        for ($i=0; $i < $size-1; $i++) {
            for ($j=0; $j < $size - $i - 1; $j++) {
                if ($array[$j] > $array[$j+1]) {
                    $tmp = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $tmp;
                }
            }
        }

        return true;
    }
}
