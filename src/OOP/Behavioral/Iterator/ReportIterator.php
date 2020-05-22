<?php

namespace OOP\Behavioral\Iterator;

use Iterator;

/**
 * Class that implements PHP's internal interface Iterator.
 */
class ReportIterator implements Iterator
{
    private $position = 0;
    private $report;

    public function __construct($report)
    {
        $this->report = $report;
    }

    public function current()
    {
        return $this->report->getPage($this->position);
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->report->getPage($this->position) !== null;
    }
}
