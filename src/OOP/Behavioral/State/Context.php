<?php

namespace OOP\Behavioral\State;

/**
 * Abstract class for Report's Context object.
 */
abstract class Context
{
    protected $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    public function transitionTo(State $state)
    {
        $this->state = $state;
        $this->state->setContext($this);
    }
}
