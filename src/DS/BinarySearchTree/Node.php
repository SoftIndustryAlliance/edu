<?php

namespace DS\BinarySearchTree;

use DS\BinarySearchTree\BinarySearchTreeInterface;
use \SplQueue;

class Node implements BinarySearchTreeInterface
{
    private $left = null;
    private $right = null;
    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function insert(int $key, $value): BinarySearchTreeInterface
    {
        if ($this->key === $key) {
            $this->value = $value;
            return $this;
        } elseif ($this->key === null) {
            $this->key = $key;
            $this->value = $value;
            return $this;
        } elseif ($key < $this->key) {
            if ($this->left === null) {
                $this->left = new Node($key, $value);
                return $this->left;
            }
            return $this->left->insert($key, $value);
        } elseif ($key > $this->key) {
            if ($this->right === null) {
                $this->right = new Node($key, $value);
                return $this->right;
            }
            return $this->right->insert($key, $value);
        }
    }

    public function find(int $key)
    {
        if ($this->key === $key) {
            return $this->value;
        } elseif ($key < $this->key) {
            if ($this->left === null) {
                return null;
            }
            return $this->left->find($key);
        } elseif ($key > $this->key) {
            if ($this->right === null) {
                return null;
            }
            return $this->right->find($key);
        }
        return null;
    }

    public function remove(int $key, ?BinarySearchTreeInterface $parent = null): bool
    {
        if ($key < $this->key) {
            if ($this->left === null) {
                return false;
            }
            return $this->left->remove($key, $this);
        } elseif ($key > $this->key) {
            if ($this->right === null) {
                return false;
            }
            return $this->right->remove($key, $this);
        }

        // Remove here
        if ($this->left && $this->right) {
            // both children are present
            $successor = $this->right->findMin();
            $this->key = $successor->getKey();
            $this->value = $successor->getValue();
            return $this->right->remove($successor->getKey(), $this);
        } elseif ($this->left) {
            // only left child is present
            return $this->replaceInParent($parent, $this->left);
        } elseif ($this->right) {
            // only right child is present
            return $this->replaceInParent($parent, $this->right);
        }

        // the node is leaf
        return $this->replaceInParent($parent, null);
    }

    private function replaceInParent($parent, $newValue)
    {
        if ($parent) {
            if ($parent->getLeft() === $this) {
                $parent->setLeft($newValue);
                return true;
            }
            $parent->setRight($newValue);
            return true;
        }

        // Removing tree head with one ancestor tree:
        // parent=null; $this is the tree head
        // Replace $this with values from a $child.
        $child = $this->left ?? $this->right;
        if ($child) {
            $this->right = $child->getRight();
            $this->left = $child->getLeft();
            $this->key = $child->getKey();
            $this->value = $child->getValue();
            unset($child);
        }
        $this->key = null;
        $this->value = null;

        return true;
    }

    public function inOrder()
    {
        if ($this->left) {
            $this->left->inOrder();
        }
        echo $this->key. ' '. $this->value . PHP_EOL;
        if ($this->right) {
            $this->right->inOrder();
        }
    }

    /**
     * Return minimum node in a subtree.
     *
     * @return BinarySearchTreeInterface
     */
    public function findMin(): BinarySearchTreeInterface
    {
        $currentNode = $this;
        while ($currentNode->left) {
            $currentNode = $this->left;
        }
        return $currentNode;
    }

    /**
     * Get the value of Left
     *
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set the value of Left
     *
     * @param mixed $left
     *
     * @return self
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * Get the value of Right
     *
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set the value of Right
     *
     * @param mixed $right
     *
     * @return self
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get the value of key
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of Value
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of Value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of Value
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * BreadthFirstSearch
     *
     * @param  string $key
     * @return mixed
     */
    public function breadthFirstSearch($key)
    {
        $queue = new SplQueue();

        $queue->enqueue($this);
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node->getKey() === $key) {
                return $node->getValue();
            }
            if ($node->getLeft()) {
                $queue->enqueue($node->getLeft());
            }
            if ($node->getRight()) {
                $queue->enqueue($node->getRight());
            }
        }
    }
}
