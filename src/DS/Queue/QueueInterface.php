<?php

namespace DS\Queue;

interface QueueInterface
{
    public function isEmpty();
    public function peek();
    public function enqueue($data);
    public function dequeue();
}
