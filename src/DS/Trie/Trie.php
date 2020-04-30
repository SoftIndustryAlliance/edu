<?php

namespace DS\Trie;

use DS\Trie\TrieNode;
use \SplQueue;

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
        return $node->getValue();
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

    /**
     * Find deepest value by a prefix key.
     *
     * @param  string $key
     * @return mixed
     */
    public function findDeepestNodeValue(string $key)
    {
        $queue = new SplQueue();
        $deepestNodeValue = null;

        //find last node for given prefix
        $node = $this->head;
        for ($i = 0; $i < strlen($key); $i++) {
            if (!$node->checkChild($key[$i])) {
                return null;
            }
            $node = $node->getChild($key[$i]);
        }

        // traverse remaining nodes iteratively
        $queue->enqueue($node);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $deepestNodeValue = $node->getValue();
            $children = $node->getChildren();
            if (\is_array($children)) {
                foreach ($children as $node) {
                    $queue->enqueue($node);
                }
            }
        }
        return $deepestNodeValue;
    }

    /**
     * Find word suggestions by a prefix key.
     *
     * @param  string $key
     * @return mixed
     */
    public function findSuggestions(string $key): array
    {
        $queue = new SplQueue();
        $suggestions = array();

        //find last node for given prefix
        $node = $this->head;
        for ($i = 0; $i < strlen($key); $i++) {
            if (!$node->checkChild($key[$i])) {
                return null;
            }
            $node = $node->getChild($key[$i]);
        }

        // traverse remaining nodes iteratively
        $queue->enqueue($node);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node->getValue()) {
                $suggestions[] = $node->getValue();
            }
            $children = $node->getChildren();
            if (\is_array($children)) {
                foreach ($children as $node) {
                    $queue->enqueue($node);
                }
            }
        }
        return $suggestions;
    }
}
