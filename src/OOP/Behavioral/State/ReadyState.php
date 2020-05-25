<?php

namespace OOP\Behavioral\State;

/**
 * Ready Report state.
 */
class ReadyState extends State
{
    public function keySet(): void
    {
        return;
    }

    public function generate(): bool
    {
        $this->context->setContent('Content for key '. $this->context->getKey());
        return true;
    }

    public function getReport(): string
    {
        return $this->context->getContent();
    }
}
