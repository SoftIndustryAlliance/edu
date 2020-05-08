<?php

namespace Algo\PatternSearch;

class NaiveSearch implements PatternSearchInterface
{
    public static function search(string $text, string $pattern): array
    {
        $textSize = strlen($text);
        $patternSize = strlen($pattern);
        $result = [];

        for ($i=0; $i<$textSize; $i++) {
            $j = 0;
            while ($j < $patternSize && $i+$j < $textSize && $text[$i+$j] === $pattern[$j]) {
                $j++;
            }
            if ($j === $patternSize) {
                $result[] = $i;
            }
        }

        return $result;
    }
}
