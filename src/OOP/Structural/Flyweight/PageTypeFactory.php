<?php

namespace OOP\Structural\Flyweight;

use Countable;

/**
 * A Factory class which creates and stores Flyweight objects.
 */
class PageTypeFactory implements Countable
{
    private $pageTypes = [];

    public function getPageType($type, $logo)
    {
        if (!isset($this->pageTypes[$type])) {
            $this->pageTypes[$type] = new PageType($type, $logo);
        }
        return $this->pageTypes[$type];
    }

    public function count(): int
    {
        return count($this->pageTypes);
    }
}
