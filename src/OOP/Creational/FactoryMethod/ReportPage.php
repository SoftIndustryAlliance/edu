<?php

namespace OOP\Creational\FactoryMethod;

/**
 * An abstract class for the Factory Method pattern.
 */
abstract class ReportPage
{
    /** @var Report **/
    protected $report;

    abstract public function makeReport(): ReportPage;

    public function printReport(int $key): string
    {
        return $this->report->generate($key);
    }
}
