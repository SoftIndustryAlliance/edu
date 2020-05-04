<?php

namespace DS\DoublyLinkedList;

class Node
{
    private $next = null;
    private $prev = null;
    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Get the value of Next
     *
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Set the value of Next
     *
     * @param mixed $next
     *
     * @return self
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * Get the value of Key
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of Key
     *
     * @param mixed $key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of Value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of Value
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of Prev
     *
     * @return mixed
     */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * Set the value of Prev
     *
     * @param mixed $prev
     *
     * @return self
     */
    public function setPrev($prev)
    {
        $this->prev = $prev;

        return $this;
    }
}
