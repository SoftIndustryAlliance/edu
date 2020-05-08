<?php

namespace Algo\Search;

class BinarySearch implements SearchInterface
{
    public static function search(array $array, int $item): int
    {
        return self::binarySearch($array, $item, 0, count($array));
    }

    private static function binarySearch(array $array, int $item, int $from, int $to): int
    {
        if ($from > $to) {
            return -1;
        }

        $middle = $from + intval(($to - $from) / 2);
        if ($array[$middle] === $item) {
            return $middle;
        }

        if ($array[$middle] > $item) {
            // search in the left part
            return self::binarySearch($array, $item, $from, $middle - 1);
        }

        // search in the right part
        return self::binarySearch($array, $item, $middle + 1, $to);

        return -1;
    }
}
