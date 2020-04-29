<?php

namespace DS\Trie;

use DS\Trie\TrieNode;

class Trie implements TrieInterface
{
    private $head;

    public function __construct()
    {
        $this->head = new TrieNode();
    }

    /**
     * Find value by key.
     * @param  string $key
     * @return mixed
     */
    public function find(string $key)
    {
        $node = $this->head;
        for ($i = 0; $i < strlen($key); $i++) {
            if (!$node->checkChild($key[$i])) {
                return null;
            }
            $node = $node->getChild($key[$i]);
        }
        $node->getValue();
    }


    public function insert(string $key, $value)
    {
        $node = $this->head;
        for ($i = 0; $i < strlen($key); $i++) {
            if (!$node->checkChild($key[$i])) {
                $node->setChild($key[$i], new TrieNode());
            }
            $node = $node->getChild($key[$i]);
        }
        $node->setValue($value);
    }
}
