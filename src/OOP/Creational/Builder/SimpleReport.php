<?php

namespace OOP\Creational\Builder;

/**
 * Builder interface for report building.
 */
class SimpleReport implements Builder
{
    private $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function setKey(int $key): Builder
    {
        $this->report->setKey($key);

        return $this;
    }

    public function buildPager(): Builder
    {
        //no pager in simple report
        return $this;
    }

    public function buildHeader(): Builder
    {
        $this->report->setHeader('This is a simple header for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function buildContent(): Builder
    {
        $this->report->setContent('This is a simple content for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function buildFooter(): Builder
    {
        //no footer in simple report
        return $this;
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
