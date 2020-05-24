<?php

namespace OOP\Behavioral\Mediator;

class Footer extends Colleague
{
    private $footer;

    public function generate(int $key)
    {
        $this->footer = 'Footer for report '.$key.PHP_EOL;
        $this->mediator->notify($this, 'footerReady');
    }

    public function getFooter(): string
    {
        return $this->footer;
    }
}
