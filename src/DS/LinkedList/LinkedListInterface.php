<?php

namespace DS\LinkedList;

use DS\LinkedList\LinkedListNode;

/**
 * Linked list to use in the HashMap. Based on keys.
 */
interface LinkedListInterface
{
    public function insert($key, $value): LinkedListNode;
    public function remove($key): bool;
    public function count(): int;
    public function get($key);
    public function first();
}
