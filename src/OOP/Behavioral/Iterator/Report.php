<?php

namespace OOP\Behavioral\Iterator;

use IteratorAggregate;

/**
 * Class that implements PHP's internal interface IteratorAggregate.
 */
class Report implements IteratorAggregate
{
    private $pages = [];

    public function addPage(string $pageContent)
    {
        $this->pages[] = $pageContent;
    }

    public function getPage(int $pageNumber): ?string
    {
        if (!isset($this->pages[$pageNumber])) {
            return null;
        }
        return $this->pages[$pageNumber];
    }

    public function getIterator()
    {
        return new ReportIterator($this);
    }
}
