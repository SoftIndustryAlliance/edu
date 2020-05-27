<?php

namespace OOP\Behavioral\Visitor;

/**
 * Concrete class for a Component object.
 */
class Content implements Component
{
    private $key;
    private $content;

    public function accept(ReportVisitor $visitor): void
    {
        $visitor->visitContent($this);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey(int $key)
    {
        $this->key = $key;

        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }
}
