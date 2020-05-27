<?php

namespace OOP\Behavioral\Visitor;

/**
 * Client Report class.
 */
class Report
{
    private $key;
    private $components = [];

    public function __construct(int $key, Header $header, Content $content)
    {
        $this->components[] = $header;
        $this->components[] = $content;
        $this->setKey($key);
    }

    public function accept(ReportVisitor $visitor): void
    {
        foreach ($this->components as $component) {
            $component->accept($visitor);
        }
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey(int $key)
    {
        $this->key = $key;
        foreach ($this->components as $component) {
            $component->setKey($this->key);
        }

        return $this;
    }

    public function getContent(): string
    {
        $content = '';
        foreach ($this->components as $component) {
            $content .= $component->getContent();
        }

        return $content;
    }
}
