<?php

namespace OOP\Behavioral\State;

/**
 * Abstract class for Report's State objects.
 */
abstract class State
{
    protected $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function keySet(): void;
    abstract public function generate(): bool;
    abstract public function getReport(): string;
}
