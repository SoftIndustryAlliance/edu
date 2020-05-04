<?php

namespace DS\LinkedList;

use DS\LinkedList\LinkedListNode;

class CircularLinkedList implements LinkedListInterface
{
    private $head = null;

    /**
     * Inserts or updates a node.
     * @param  $key
     * @param  $value
     * @return bool
     */
    public function insert($key, $value): LinkedListNode
    {
        if (is_null($this->head)) {
            return $this->init($key, $value);
        }

        // Update existing.
        $existing = $this->find($key);
        if ($existing !== null) {
            $existing->setValue($value);
            return $existing;
        }

        // Insert new last.
        $newNode = new LinkedListNode($key, $value);
        $newNode->setNext($this->head->getNext());
        $this->head->setNext($newNode);
        return $newNode;
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
        $this->head = new LinkedListNode($key, $value);
        $this->head->setNext($this->head);
        return $this->head;
    }

    /**
    * Find and return a node with a given key.
    *
    * @param $key a node's key.
    * @return LinkedListNode|null
    */
    private function find($key): ?LinkedListNode
    {
        if ($this->head === null) {
            return null;
        }

        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->head);

        do {
            $current = $current->getNext();
            if ($current->getKey() === $key) {
                return $current;
            }
        } while ($current->getNext() !== $this->head);

        return null;
    }

    /**
     * Removes a node by key.
     * @param  $key
     * @return bool
     */
    public function remove($key): bool
    {
        if ($this->head === null) {
            return false;
        }

        $previous = $this->head;
        $current = $this->head->getNext();
        do {
            if ($current->getKey() === $key) {
                $previous->setNext($current->getNext());
                if ($current === $this->head) {
                    $this->head = $current->getNext();
                }
                unset($current);
                return true;
            }
            $previous = $current;
            $current = $current->getNext();
        } while ($current->getNext() !== $this->head->getNext());

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

        if ($this->head !== null) {
            $current = new LinkedListNode(null, null); // fake first node
            $current->setNext($this->head);

            do {
                $current = $current->getNext();
                $count++;
            } while ($current->getNext() !== $this->head);
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
        return $this->head;
    }

    /**
     * Prints out a list for debug purposes.
     *
     * @return bool
     */
    public function printOut()
    {
        $current = new LinkedListNode(null, null); // fake first node
        $current->setNext($this->head);
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
        } while ($current->getNext() !== $this->head);

        return true;
    }
}
