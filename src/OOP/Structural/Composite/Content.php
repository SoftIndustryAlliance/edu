<?php

namespace OOP\Structural\Composite;

/**
 * The Leaf class at Composite pattern.
 */
class Content implements Renderable
{
    private $content;

    public function __construct(int $key)
    {
        $this->content = 'This is a content for report '.$key;
    }

    public function render(): string
    {
        return $this->content.PHP_EOL;
    }
}
