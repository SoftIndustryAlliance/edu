<?php

namespace Algo\PatternSearch;

use SplFixedArray;

class RabinKarpSearch implements PatternSearchInterface
{
    const PRIMENUMBER = 101;
    const BASE = 256; // alphabet size

    public static function search(string $text, string $pattern): array
    {
        $textSize = strlen($text);
        $patternSize = strlen($pattern);
        $result = [];
        $j = 0;
        $i = 0;

        // used in rolling hash calculation
        $power = 1;
        for ($i=0; $i<$patternSize-1; $i++) {
            $power = ($power * self::BASE) % self::PRIMENUMBER;
        }

        // init hashes for text and pattern
        $pattenHash = self::createHash($pattern);
        $rollingHash = self::createHash($text, $patternSize);

        for ($i=0; $i <= $textSize - $patternSize; $i++) {
            if ($rollingHash === $pattenHash) {
                // check characters one by one
                for ($j=0; $j<$patternSize; $j++) {
                    if ($text[$i+$j] !== $pattern[$j]) {
                        break;
                    }
                }
                if ($j === $patternSize) {
                    // pattern found
                    $result[] = $i;
                }
            }

            if ($i < $textSize - $patternSize) {
                // roll hash to the right
                $rollingHash = (
                    self::BASE * ($rollingHash - ord($text[$i]) * $power)
                    + ord($text[$i + $patternSize])
                ) % self::PRIMENUMBER; // geeks for geeks
                // $rollingHash = (
                //     ($rollingHash + self::PRIMENUMBER - ord($text[$i]) * $power) * self::BASE
                //     + ord($text[$i + $patternSize])
                // ) % self::PRIMENUMBER; // wiki
                if ($rollingHash < 0) {
                    $rollingHash = $rollingHash + self::PRIMENUMBER;
                }
            }
        }

        return $result;
    }

    private static function createHash(string $string, int $length = 0): int
    {
        $hash = 0;
        if ($length === 0) {
            //hash for the whole string (pattern)
            $length = strlen($string);
        }

        for ($i = 0; $i < $length; $i++) {
            $hash = ($hash * self::BASE + ord($string[$i])) % self::PRIMENUMBER; // geeks for geeks
            // $hash = (($hash * self::BASE) % self::PRIMENUMBER + ord($string[$i])) % self::PRIMENUMBER; // wiki
        }
        return $hash;
    }
}
