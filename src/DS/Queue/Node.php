<?php

namespace DS\Queue;

class Node
{
    private $data;
    private $next;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the value of Data
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of Data
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
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
}
