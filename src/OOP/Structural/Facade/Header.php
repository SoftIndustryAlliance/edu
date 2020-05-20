<?php

namespace OOP\Structural\Facade;

class Header implements Component
{
    protected $content = 'Header content'.PHP_EOL;

    public function addContent(string $content): Component
    {
        $this->content .= $content.PHP_EOL;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
