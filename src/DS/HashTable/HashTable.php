<?php

namespace DS\HashTable;

use DS\HashTable\HasherInterface;
use DS\LinkedList\LinkedList;
use SplFixedArray;

/**
 * HashTable implementation for educational purposes.
 */
class HashTable implements HashTableInterface
{
    private $hasher; // key hasher
    private $data; // main data array
    private $size; // size of the array
    private $minSize; // size of the array
    private $loadFactor; // load factor to detect when to scale up
    private $load = 0; // current load

    public function __construct(HasherInterface $hasher, $loadFactor = 0.75)
    {
        $this->hasher = $hasher;
        $this->minSize = pow(2, 8); // initial size 256
        $this->size = $this->minSize;
        $this->data = new SplFixedArray($this->size);
        $this->loadFactor = $loadFactor;
    }

    /**
     * Put a key value into hash map.
     * @param $key
     * @param $value
     * @return bool
     */
    public function put($key, $value): bool
    {
        $list = $this->getList($key);
        $list->insert($key, $value);
        $this->loadIncrease();
        return true;
    }

    /**
     * Get a value from hash map by key.
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        $list = $this->getList($key);
        return $list->get($key);
    }

    /**
     * Remove a value from hash map by key.
     * @param $key
     * @return bool
     */
    public function remove($key): bool
    {
        $list = $this->getList($key);
        if ($list->remove($key)) {
            $this->loadDecrease();
            return true;
        }
        return false;
    }

    /**
     * Converts hash code to the data array index.
     * @param  int $hashCode
     * @return int array index
     */
    public function convertToIndex(int $hashCode): int
    {
        return $hashCode % $this->size;
    }

    /**
     * Prints hash map for debug purposes.
     * @return bool
     */
    public function printOut()
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] === null) {
                continue;
            }
            echo 'index: ' . $i . ' - count: ' . $this->data[$i]->count() . PHP_EOL;
            // $this->data[$i]->printOut();
        }
        return true;
    }

    /**
     * Gets linked list from hash map for a given key.
     * @param  $key
     * @return LinkedList
     */
    private function getList($key): LinkedList
    {
        $hashCode = $this->hasher->getHashCode($key);
        $index = $this->convertToIndex($hashCode);
        if ($this->data[$index] === null) {
            $this->data[$index] = new LinkedList();
        }
        return $this->data[$index];
    }

    /**
     * Increase load and call scale up if needed.
     */
    private function loadIncrease()
    {
        $this->load++;
        if ($this->load > ($this->size * $this->loadFactor)) {
            // need to increase the table size
            $this->scaleUp();
        }
    }

    /**
     * Decrease load and call scale down if needed.
     * @return [type] [description]
     */
    private function loadDecrease()
    {
        $this->load--;
        if ($this->load < ($this->size - $this->size * $this->loadFactor) && $this->size > $this->minSize) {
            // need to decrease the table size
            $this->scaleDown();
        }
    }

    /**
     * Increase data size.
     * @return bool
     */
    private function scaleUp()
    {
        $this->size = $this->size * 2;
        return $this->transferData();
    }

    /**
     * Decrease data size.
     * @return bool
     */
    private function scaleDown()
    {
        $this->size = $this->size / 2;
        return $this->transferData();
    }

    /**
     * Transfer data from old array to the new one.
     * @return bool
     */
    private function transferData()
    {
        $oldData = $this->data;
        $this->data = new SplFixedArray($this->size);
        for ($i = 0; $i < $oldData->getSize(); $i++) {
            if ($oldData[$i] === null) {
                continue;
            }

            $fakeList = new LinkedList();
            $fakeList->insert(null, null);
            $current = $fakeList->first(); // fake first node
            $current->setNext($oldData[$i]->first());
            do {
                $current = $current->getNext();
                if ($current === null) {
                    break;
                }
                $list = $this->getList($current->getKey());
                $list->insert($current->getKey(), $current->getValue());
            } while ($current->getNext() !== null);
        }
        unset($oldData);
        return true;
    }
}
