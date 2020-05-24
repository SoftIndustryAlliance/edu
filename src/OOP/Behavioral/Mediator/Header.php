<?php

namespace OOP\Behavioral\Mediator;

class Header extends Colleague
{
    private $header;

    public function generate(int $key)
    {
        $this->header = 'Header for report '.$key.PHP_EOL;
        $this->mediator->notify($this, 'headerReady');
    }

    public function getHeader(): string
    {
        return $this->header;
    }
}
