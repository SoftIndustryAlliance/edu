<?php

namespace OOP\Behavioral\Observer;

use SplObserver;
use SplSubject;

class Header implements SplObserver
{
    private $header;

    public function __construct()
    {
        $this->header = '';
    }

    public function update(SplSubject $subject): void
    {
        $this->header = 'Header for report key '.$subject->getKey().PHP_EOL;
    }

    public function getHeader(): string
    {
        return $this->header;
    }
}
