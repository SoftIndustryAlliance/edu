<?php

namespace OOP\Structural\Decorator;

/**
 * Header decorator that adds content to header.
 */
class HeaderDecorator implements Report
{
    private $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function setHeader(string $header): Report
    {
        $header = $header.PHP_EOL.'A Company Logo!';
        return $this->report->setHeader($header);
    }

    public function setContent(string $content): Report
    {
        return $this->report->setContent($content);
    }

    public function setFooter(string $footer): Report
    {
        return $this->report->setFooter($footer);
    }

    public function getReport(): string
    {
        return $this->report->getReport();
    }
}
