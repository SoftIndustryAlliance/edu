<?php

namespace DS\Heap;

interface HeapInterface
{
    public function peek(): int;
    public function poll(): int;
    public function add(int $item);
    public function getSize(): int;
    public function getCapacity(): int;
}
