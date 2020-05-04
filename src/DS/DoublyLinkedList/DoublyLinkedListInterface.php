<?php

namespace DS\DoublyLinkedList;

use DS\DoublyLinkedList\Node;

/**
 * Linked list to use in the HashMap. Based on keys.
 */
interface DoublyLinkedListInterface
{
    public function push($key, $value): Node;
    public function pop(): ?Node;
    public function unshift($key, $value): Node;
    public function shift(): ?Node;
    public function offsetUnset(int $index): bool;
    public function offsetGet(int $index): ?Node;
    public function count(): int;
    public function isEmpty(): bool;
}
