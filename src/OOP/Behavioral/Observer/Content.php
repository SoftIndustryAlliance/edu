<?php

namespace OOP\Behavioral\Observer;

use SplObserver;
use SplSubject;

class Content implements SplObserver
{
    private $content;

    public function __construct()
    {
        $this->content = '';
    }

    public function update(SplSubject $subject): void
    {
        $this->content = 'Content for report key '.$subject->getKey().PHP_EOL;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
