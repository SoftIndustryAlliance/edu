<?php

namespace DS\HashTable;

/**
 * Class for string hashing
 * based on https://cp-algorithms.com/string/string-hashing.html
 */
class StringHasher implements HasherInterface
{
    const PRIMENUMBER = 31;
    const RANGE = 1e9 + 9;

    public function getHashCode($key): int
    {
        $hash = 0;
        $pow = 1;
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash + ord($key[$i]) * $pow) % self::RANGE;
            $pow = ($pow * self::PRIMENUMBER) % self::RANGE;
        }
        return $hash;
    }
}
