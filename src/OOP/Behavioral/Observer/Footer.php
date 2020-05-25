<?php

namespace OOP\Behavioral\Observer;

use SplObserver;
use SplSubject;

class Footer implements SplObserver
{
    private $footer;

    public function __construct()
    {
        $this->footer = '';
    }

    public function update(SplSubject $subject): void
    {
        $this->footer = 'Footer for report key '.$subject->getKey().PHP_EOL;
    }

    public function getFooter(): string
    {
        return $this->footer;
    }
}
