<?php

namespace OOP\Creational\Builder;

/**
 * Builder interface for report building.
 */
class FullReport implements Builder
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
        $this->report->setPager('This is a pager for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function buildHeader(): Builder
    {
        $this->report->setHeader('This is a full header for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function buildContent(): Builder
    {
        $this->report->setContent('This is a full content for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function buildFooter(): Builder
    {
        $this->report->setFooter('This is a full footer for '.$this->report->getKey().PHP_EOL);
        return $this;
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
