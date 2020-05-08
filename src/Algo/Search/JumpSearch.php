<?php

namespace Algo\Search;

class JumpSearch implements SearchInterface
{
    public static function search(array $array, int $item): int
    {
        $size = count($array);
        $step = intval(sqrt($size));

        $left = 0;
        $right = $step;

        while ($right !== $size - 1  && $item > $array[$right]) {
            $left = $right + 1;
            $right = min($left + $step, $size - 1);
        }

        for ($i=$left; $i<=$right; $i++) {
            if ($array[$i] === $item) {
                return $i;
            }
        }

        return -1;
    }
}
