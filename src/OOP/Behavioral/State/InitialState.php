<?php

namespace OOP\Behavioral\State;

/**
 * Initial Report state.
 */
class InitialState extends State
{
    public function keySet(): void
    {
        $this->context->transitionTo(new ReadyState());
    }

    public function generate(): bool
    {
        // Initial state - key is not set.
        return false;
    }

    public function getReport(): string
    {
        // Report is empty
        return '';
    }
}
