<?php

namespace DS\Stack;

use DS\Stack\Node;
use DS\Stack\StackInterface;

class Stack implements StackInterface
{
    private $head;

    public function isEmpty()
    {
        return $this->head === null;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->head->getData();
    }

    public function push($data)
    {
        if ($this->isEmpty()) {
            $this->head = new Node($data);
            return;
        }
        $newNode = new Node($data);
        $newNode->setNext($this->head);
        $this->head = $newNode;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $data = $this->head->getData();
        $this->head = $this->head->getNext();
        return $data;
    }
}
