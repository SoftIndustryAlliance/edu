<?php

namespace OOP\Structural\Composite;

/**
 * The Leaf class at Composite pattern.
 */
class Header implements Renderable
{
    private $content;

    public function __construct(int $key)
    {
        $this->content = 'This is a header for report '.$key;
    }

    public function render(): string
    {
        return $this->content.PHP_EOL;
    }
}
