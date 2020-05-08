<?php

namespace Algo\Search;

class InterpolationSearch implements SearchInterface
{
    public static function search(array $array, int $item): int
    {
        return self::interpolationSearch($array, $item, 0, count($array) - 1);
    }

    private static function interpolationSearch(array $array, int $item, int $left, int $right): int
    {
        if ($left >= $right) {
            return -1;
        }

        $interpolatedPos = $left + intval(
            ($item - $array[$left]) * ($right - $left)
            / ($array[$right] - $array[$left])
        );

        if ($interpolatedPos > $right || $interpolatedPos < $left) {
            return -1;
        }

        if ($array[$interpolatedPos] === $item) {
            return $interpolatedPos;
        }

        if ($array[$interpolatedPos] > $item) {
            // search in the left part
            return self::interpolationSearch($array, $item, $left, $interpolatedPos - 1);
        }

        // search in the right part
        return self::interpolationSearch($array, $item, $interpolatedPos + 1, $right);

        return -1;
    }
}
