<?php

namespace DS\Queue;

use DS\Queue\Node;
use DS\Queue\QueueInterface;

class Queue implements QueueInterface
{
    private $head;
    private $tail;

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

    public function enqueue($data)
    {
        if ($this->isEmpty()) {
            $this->head = new Node($data);
            $this->tail = $this->head;
            return;
        }
        $newNode = new Node($data);
        $newNode->setNext($this->tail);
        $this->tail = $newNode;
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $data = $this->head->getData();
        $this->head = $this->head->getNext();
        return $data;
    }
}
