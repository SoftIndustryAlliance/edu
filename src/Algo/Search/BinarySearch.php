<?php

namespace Algo\Search;

class BinarySearch implements SearchInterface
{
    public static function search(array $array, int $item): int
    {
        return self::binarySearch($array, $item, 0, count($array) - 1);
    }

    private static function binarySearch(array $array, int $item, int $left, int $right): int
    {
        if ($left > $right) {
            return -1;
        }

        $middle = $left + intval(($right - $left) / 2);
        if ($array[$middle] === $item) {
            return $middle;
        }

        if ($array[$middle] > $item) {
            // search in the left part
            return self::binarySearch($array, $item, $left, $middle - 1);
        }

        // search in the right part
        return self::binarySearch($array, $item, $middle + 1, $right);

        return -1;
    }
}
