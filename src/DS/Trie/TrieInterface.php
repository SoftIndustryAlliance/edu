<?php

namespace DS\Trie;

interface TrieInterface
{
    public function find(string $key);
    public function insert(string $key, $value);
}
