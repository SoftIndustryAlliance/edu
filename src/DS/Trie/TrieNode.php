<?php

namespace DS\Trie;

class TrieNode
{
    private $children;
    private $value;


    public function __construct($value = null)
    {
        $this->children = array();
        $this->value = $value;
    }

    /**
     * Get children.
     *
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Get the value of a child by char.
     *
     * @return mixed
     */
    public function getChild($char)
    {
        return $this->children[$char];
    }

    /**
     * Check if a child exists.
     *
     * @return mixed
     */
    public function checkChild($char)
    {
        return array_key_exists($char, $this->children);
    }

    /**
     * Set the value of Children
     *
     * @param mixed $children
     *
     * @return self
     */
    public function setChild($char, TrieNode $node)
    {
        $this->children[$char] = $node;

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
}
