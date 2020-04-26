<?php

namespace DS\LinkedList;

use DS\LinkedList\LinkedListNode;

/**
 * Linked list to use in the HashMap. Based on keys.
 */
interface LinkedListInterface
{
    public function __construct($key, $value);
    public function insert($key, $value): bool;
    public function remove($key): bool;
    public function count(): int;
    public function get($key);
}
