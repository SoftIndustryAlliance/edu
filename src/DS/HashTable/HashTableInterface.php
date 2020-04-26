<?php

namespace DS\HashTable;

interface HashTableInterface
{
    public function put($key, $value);
    public function get($key);
    public function convertToIndex(int $hashCode): int;
}
