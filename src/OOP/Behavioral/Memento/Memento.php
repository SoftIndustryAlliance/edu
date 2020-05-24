<?php

namespace OOP\Behavioral\Memento;

/**
 * Interface for a Memento object.
 */
interface Memento
{
    public function getKey(): int;
    public function getDate(): string;
}
