<?php

namespace DS\HashTable;

interface HashTableInterface
{
    public function put($key, $value): bool;
    public function get($key);
    public function remove($key): bool;
    public function convertToIndex(int $hashCode): int;
}
