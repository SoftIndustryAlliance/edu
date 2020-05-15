<?php

namespace OOP\Creational\Builder;

/**
 * A client class for the Builder pattern.
 */
class ReportPage
{
    private $director;

    public function __construct(Director $director)
    {
        $this->director = $director;
    }

    public function printReport(int $key): string
    {
        return $this->director->constructReport($key)->printReport();
    }
}
