<?php

namespace Algo\Search;

class LinearSearch implements SearchInterface
{
    public static function search(array $array, int $item): int
    {
        $size = count($array);
        for ($i=0; $i<$size; $i++) {
            if ($array[$i] == $item) {
                return $i;
            }
        }

        return -1;
    }
}
