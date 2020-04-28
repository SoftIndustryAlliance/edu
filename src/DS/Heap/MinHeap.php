<?php

namespace DS\Heap;

use SplFixedArray;
use Exception;

class MinHeap implements HeapInterface
{
    private $capacity = 10;
    private $size = 0;
    private $items;

    public function __construct()
    {
        $this->items = new SplFixedArray($this->capacity);
    }

    private function getLeftChildIndex(int $parentIndex): int
    {
        return 2 * $parentIndex + 1;
    }

    private function getRightChildIndex(int $parentIndex): int
    {
        return 2 * $parentIndex + 2;
    }

    private function getParentIndex(int $childIndex): int
    {
        return intval(($childIndex - 1 ) / 2);
    }

    private function hasLeftChild(int $index): bool
    {
        return $this->getLeftChildIndex($index) < $this->size;
    }

    private function hasRightChild(int $index): bool
    {
        return $this->getRightChildIndex($index) < $this->size;
    }

    private function hasParent(int $index): bool
    {
        return $this->getParentIndex($index) >= 0;
    }

    private function leftChild(int $index): int
    {
        return $this->items[$this->getLeftChildIndex($index)];
    }

    private function rightChild(int $index): int
    {
        return $this->items[$this->getRightChildIndex($index)];
    }

    private function parent(int $index): int
    {
        return $this->items[$this->getParentIndex($index)];
    }

    private function swap(int $indexOne, int $indexTwo)
    {
        $tmp = $this->items[$indexOne];
        $this->items[$indexOne] = $this->items[$indexTwo];
        $this->items[$indexTwo] = $tmp;
    }

    private function ensureExtraCapacity()
    {
        if ($this->size === $this->capacity) {
            $this->capacity *= 2;
            $oldItems = $this->items;
            $this->items = new SplFixedArray($this->capacity);
            for ($i = 0; $i < $oldItems->getSize(); $i++) {
                $this->items[$i] = $oldItems[$i];
            }
            unset($oldItems);
        }
    }

    public function peek(): int
    {
        if ($this->size === 0) {
            throw new Exception("Can't peek from an empty heap.", 1);
        }
        return $this->items[0];
    }

    public function poll(): int
    {
        if ($this->size === 0) {
            throw new Exception("Can't poll from an empty heap.", 1);
        }
        $item = $this->items[0];
        $this->items[0] = $this->items[$this->size - 1];
        $this->size--;
        $this->heapifyDown();
        return $item;
    }

    public function add(int $item)
    {
        $this->ensureExtraCapacity();
        $this->items[$this->size] = $item;
        $this->size++;
        $this->heapifyUp();
    }

    private function heapifyUp()
    {
        $index = $this->size - 1;
        while ($this->hasParent($index) && $this->parent($index) > $this->items[$index]) {
            $this->swap($index, $this->getParentIndex($index));
            $index = $this->getParentIndex($index);
        }
    }

    private function heapifyDown()
    {
        $index = 0;
        while ($this->hasLeftChild($index)) {
            $smallerChildIndex = $this->getLeftChildIndex($index);
            if ($this->hasRightChild($index) && $this->rightChild($index) < $this->items[$smallerChildIndex]) {
                $smallerChildIndex = $this->getRightChildIndex($index);
            }

            if ($this->items[$index] < $this->items[$smallerChildIndex]) {
                break;
            }
            $this->swap($index, $smallerChildIndex);
            $index = $smallerChildIndex;
        }
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}
