<?php

namespace OOP\Behavioral\Mediator;

/**
 * Interface for a Mediator object.
 */
interface Mediator
{
    public function notify(object $sender, string $event): void;
}
