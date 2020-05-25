<?php

namespace OOP\Behavioral\State;

/**
 * Concrete Report Context object.
 */
class Report extends Context
{
    private $key;
    private $content = '';

    public function setKey($key)
    {
        $this->key = $key;
        $this->state->keySet();

        return $this;
    }

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function generateReport(): bool
    {
        return $this->state->generate();
    }

    public function reportContent(): string
    {
        return $this->state->getReport();
    }
}
