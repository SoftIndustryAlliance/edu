<?php

namespace DS\DoublyLinkedList;

use DS\DoublyLinkedList\Node;
use DS\DoublyLinkedList\DoublyLinkedListInterface;

class DoublyLinkedList implements DoublyLinkedListInterface
{
    private $head = null;

    /**
     * Add node to the end of list.
     *
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return Node          [description]
     */
    public function push($key, $value): Node
    {
        if ($this->isEmpty()) {
            $this->head = new Node($key, $value);
            return $this->head;
        }

        $last = $this->head;
        while ($last->getNext() !== null) {
            $last = $last->getNext();
        }

        $newNode = new Node($key, $value);
        $newNode->setPrev($last);
        $last->setNext($newNode);
        return $newNode;
    }

    /**
     * Pop node from the end of list.
     * @return Node|null
     */
    public function pop(): ?Node
    {
        if ($this->isEmpty()) {
            return null;
        }

        $last = $this->head;
        while ($last->getNext() !== null) {
            $last = $last->getNext();
        }

        if ($last->getPrev()) {
            $last->getPrev()->setNext(null);
            return $last;
        }
        $this->head = null;
        return $last;
    }

    /**
     * Add node at the start of lit.
     * @param  [type] $key   [description]
     * @param  [type] $value [description]
     * @return Node
     */
    public function unshift($key, $value): Node
    {
        if ($this->isEmpty()) {
            $this->head = new Node($key, $value);
            return $this->head;
        }

        $newNode = new Node($key, $value);
        $newNode->setNext($this->head);
        $this->head->setPrev($newNode);
        $this->head = $newNode;
        return $this->head;
    }

    /**
     * Remove node from the start of list.
     * @return Node|null
     */
    public function shift(): ?Node
    {
        if ($this->isEmpty()) {
            return null;
        }

        $node = $this->head;
        if ($this->head->getNext()) {
            $this->head->getNext()->setPrev(null);
            $this->head = $this->head->getNext();
            return $node;
        }
        $this->head = null;
        return $node;
    }

    /**
     * Remove a node at index.
     * @param  int $index [description]
     * @return bool        [description]
     */
    public function offsetUnset(int $index): bool
    {
        $node = $this->offsetGet($index);
        if ($node === null) {
            return false;
        }

        // head is deleted
        if ($this->head === $node) {
            $this->head = $node->getNext();
        }

        // change next
        if ($node->getNext() !== null) {
            $node->getNext()->setPrev($node->getPrev());
        }

        //change prev
        if ($node->getPrev() !== null) {
            $node->getPrev()->setNext($node->getNext());
        }
        return true;
    }

    /**
     * Get a node at index.
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function offsetGet(int $index): ?Node
    {
        if ($this->isEmpty()) {
            return null;
        }
        $count = 0;

        $last = new Node(null, null); // fake first node
        $last->setNext($this->head);
        do {
            $last = $last->getNext();
            if ($count === $index) {
                return $last;
            }
            $count++;
        } while ($last->getNext() !== null);

        return null;
    }

    /**
     * Count nodes in list.
     * @return int
     */
    public function count(): int
    {
        $count = 0;

        if ($this->head !== null) {
            $current = new Node(null, null); // fake first node
            $current->setNext($this->head);

            do {
                $current = $current->getNext();
                $count++;
            } while ($current->getNext() !== null);
        }

        return $count;
    }

    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    /**
     * Print list for debug purposes.
     * @return int
     */
    public function printOut()
    {
        $current = new Node(null, null); // fake first node
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
        } while ($current->getNext() !== null);

        return true;
    }
}
