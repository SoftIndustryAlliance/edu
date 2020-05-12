<?php

namespace DS\LinkedList;

use DS\LinkedList\LinkedListNode;
use \Countable;
use \Iterator;

class LinkedList implements LinkedListInterface, Countable, Iterator
{
    private $first = null;
    private $last = null;
    private $count = 0;
    private $current = null;

    /**
     * Inserts or updates a node.
     * @param  $key
     * @param  $value
     * @return bool
     */
    public function insert($key, $value): LinkedListNode
    {
        if (is_null($this->first)) {
            return $this->init($key, $value);
        }

        // Update existing.
        $existing = $this->find($key);
        if ($existing !== null) {
            $existing->setValue($value);
            return $existing;
        }

        // Insert new last.
        $this->last->setNext(new LinkedListNode($key, $value));
        $this->last = $this->last->getNext();
        $this->count++;
        return $this->last;
    }

    /**
     * Removes a node by key.
     * @param  $key
     * @return bool
     */
    public function remove($key): bool
    {
        if ($this->first === null) {
            return false;
        }

        $previous = null;
        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->first);

        do {
            $previous = $current;
            $current = $current->getNext();
            if ($current->getKey() === $key) {
                $previous->setNext($current->getNext());
                if ($current === $this->first) {
                    $this->first = $current->getNext();
                }
                unset($current);
                $this->count--;
                return true;
            }
        } while ($current->getNext() !== null);
        return false;
    }

    /**
     * Counts nodes in the list.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }

    /**
     * Get value from a node by key.
     *
     * @param $key
     */
    public function get($key)
    {
        $existing = $this->find($key);
        if ($existing === null) {
            return null;
        }
        return $existing->getValue();
    }

    /**
     * Get first node.
     *
     * @param $key
     */
    public function first()
    {
        return $this->first;
    }

    /**
     * Prints out a list for debug purposes.
     *
     * @return bool
     */
    public function printOut()
    {
        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->first);
        $index = 1;

        do {
            $current = $current->getNext();
            if ($current === null) {
                echo "- list empty";
                return true;
            }
            echo $index . '. - key: ' . $current->getKey() . PHP_EOL;
            echo '     value: ' . $current->getValue() . PHP_EOL;
            $index++;
        } while ($current->getNext() !== null);

        return true;
    }

    /**
     * Creates first element when empty list.
     *
     * @param  $key
     * @param  $value
     * @return bool
     */
    private function init($key, $value)
    {
        $this->first = new LinkedListNode($key, $value);
        $this->last = $this->first;
        $this->count = 1;
        return $this->last;
    }

    /**
    * Find and return a node with a given key.
    *
    * @param $key a node's key.
    * @return LinkedListNode|null
    */
    private function find($key)
    {
        if ($this->first === null) {
            return null;
        }
        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->first);

        do {
            $current = $current->getNext();
            if ($current->getKey() === $key) {
                return $current;
            }
        } while ($current->getNext() !== null);

        return null;
    }

    /**
     * Implementation of \Iterator interface.
     */
    public function rewind()
    {
        $this->current = $this->first;
    }

    /**
     * Implementation of \Iterator interface.
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * Implementation of \Iterator interface.
     */
    public function key()
    {
        return $this->current->getKey();
    }

    /**
     * Implementation of \Iterator interface.
     */
    public function next()
    {
        if ($this->current !== null) {
            $this->current = $this->current->getNext();
        }
    }

    /**
     * Implementation of \Iterator interface.
     */
    public function valid()
    {
        return $this->current !== null;
    }
}
