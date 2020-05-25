<?php

namespace OOP\Behavioral\Observer;

use SplSubject;
use SplObserver;
use SplObjectStorage;

/**
 * This is the Subject/Publisher class for the Observer pattern.
 */
class Report implements SplSubject
{
    private $key;
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setKey(int $key)
    {
        $this->key = $key;
        $this->notify();
    }

    public function getKey(): int
    {
        return $this->key;
    }
}
