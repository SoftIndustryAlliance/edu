<?php

namespace Algo\PatternSearch;

use SplFixedArray;

class KMPSearch implements PatternSearchInterface
{
    public static function search(string $text, string $pattern): array
    {
        $textSize = strlen($text);
        $patternSize = strlen($pattern);
        $result = [];
        $j = 0;
        $i = 0;

        $lps = new SplFixedArray($patternSize);
        self::createLPS($lps, $pattern);

        while ($i < $textSize) {
            if ($text[$i] === $pattern[$j]) {
                // found pattern match - continue search
                $j++;
                $i++;
            }

            if ($j === $patternSize) {
                // found whole pattern; reset $j
                $result[] = $i - $j;
                $j = $lps[$j - 1];
            } elseif ($i < $textSize && $text[$i] !== $pattern[$j]) {
                if ($j > 0) {
                    $j = $lps[$j - 1];
                    continue;
                }
                $i++;
            }
        };

        return $result;
    }

    private static function createLPS(&$lps, $pattern)
    {
        $j = 0;
        $i = 1;
        $patternSize = strlen($pattern);
        $lps[0] = 0;

        while ($i < $patternSize) {
            if ($pattern[$j] === $pattern[$i]) {
                $j++;
                $lps[$i] = $j;
                $i++;
                continue;
            }
            if ($j > 0) {
                $j = $lps[$j-1];
                continue;
            }
            $lps[$i] = 0;
            $i++;
        }
    }
}
