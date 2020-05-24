<?php

namespace OOP\Behavioral\Mediator;

class Content extends Colleague
{
    private $content;

    public function generate(int $key)
    {
        $this->content = 'Content for report '.$key.PHP_EOL;
        $this->mediator->notify($this, 'contentReady');
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
