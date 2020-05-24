<?php

namespace OOP\Behavioral\Mediator;

/**
 * Base class for classes that interact with mediator
 */
class Colleague
{
    protected $mediator;

    public function __construct(Mediator $mediator = null)
    {
        $this->mediator = $mediator;
    }

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
}
