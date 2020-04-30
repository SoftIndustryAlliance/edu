<?php

namespace DS\Trie;

interface TrieInterface
{
    public function find(string $key);
    public function insert(string $key, $value);
    public function findDeepestNodeValue(string $key);
    public function findSuggestions(string $key): array;
}
