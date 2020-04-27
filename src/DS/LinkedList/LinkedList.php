<?php

namespace DS\LinkedList;

use DS\LinkedList\LinkedListNode;

class LinkedList implements LinkedListInterface
{
    private $first = null;
    private $last = null;

    /**
     * Inserts or updates a node.
     * @param  $key
     * @param  $value
     * @return bool
     */
    public function insert($key, $value): bool
    {
        if (is_null($this->first)) {
            $this->init($key, $value);
            return true;
        }

        // Update existing.
        $existing = $this->find($key);
        if ($existing !== null) {
            $existing->setValue($value);
            return true;
        }

        // Insert new last.
        $this->last->setNext(new LinkedListNode($key, $value));
        $this->last = $this->last->getNext();
        return true;
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
        $count = 0;

        if ($this->first !== null) {
            $current = new LinkedListNode(null, null); // fake first node
            $current->setNext($this->first);

            do {
                $current = $current->getNext();
                $count++;
            } while ($current->getNext() !== null);
        }

        return $count;
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
        return true;
    }

    /**
    * Find and return a node with a given key.
    *
    * @param $key a node's key.
    * @return LinkedListNode|null
    */
    private function find($key)
    {
        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->first);

        do {
            $current = $current->getNext();
            if ($current === null) {
                break;
            }
            if ($current->getKey() === $key) {
                return $current;
            }
        } while ($current->getNext() !== null);

        return null;
    }
}
