<?php

namespace Algo\PatternSearch;

use SplFixedArray;

class ZArraySearch implements PatternSearchInterface
{
    public static function search(string $text, string $pattern): array
    {
        $textSize = strlen($text);
        $patternSize = strlen($pattern);
        $result = [];

        $zPatternLength = $patternSize + 1 + $textSize;
        $zArray = new SplFixedArray($zPatternLength);
        self::createZArray($zArray, $pattern . '$' . $text);

        for ($i=$patternSize+1; $i<$zPatternLength; $i++) {
            if ($zArray[$i] === $patternSize) {
                $result[] = $i - $patternSize - 1;
            }
        }

        return $result;
    }

    private static function createZArray(&$zArray, string $string)
    {
        $L = 0;
        $R = 0;
        $k = 0;
        $length = strlen($string);
        $zArray[0] = 0;

        for ($i=1; $i < $length; $i++) {
            if ($i > $R) {
                $L = $R = $i;
                while ($R < $length && $string[$R - $L] === $string[$R]) {
                    $R++;
                }
                $zArray[$i] = $R - $L;
                $R--;
            } else {
                $k = $i - $L;
                if ($zArray[$k] < $R - $i + 1) {
                    $zArray[$i] = $zArray[$k];
                } else {
                    $L = $i;
                    while ($R < $length && $string[$R - $L] === $string[$R]) {
                        $R++;
                    }
                    $zArray[$i] = $R - $L;
                    $R--;
                }
            }
        }
    }
}
