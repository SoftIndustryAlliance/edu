<?php

namespace DS\BinarySearchTree;

interface BinarySearchTreeInterface
{
    public function insert(int $key, $value): BinarySearchTreeInterface;
    public function find(int $key);
    public function remove(int $key, ?BinarySearchTreeInterface $parent = null): bool;
}
