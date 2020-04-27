<?php

namespace DS\LinkedList;

/**
 * Linked list to use in the HashMap. Based on keys.
 */
interface LinkedListInterface
{
    public function insert($key, $value): bool;
    public function remove($key): bool;
    public function count(): int;
    public function get($key);
    public function first();
}
