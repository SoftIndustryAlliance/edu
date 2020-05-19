<?php

namespace OOP\Structural\Decorator;

/**
 * Footer decorator that adds content to the footer.
 */
class FooterDecorator implements Report
{
    private $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function setHeader(string $header): Report
    {
        return $this->report->setHeader($header);
    }

    public function setContent(string $content): Report
    {
        return $this->report->setContent($content);
    }

    public function setFooter(string $footer): Report
    {
        $footer = $footer.PHP_EOL.'A Company Copyright!';

        return $this->report->setFooter($footer);
    }

    public function getReport(): string
    {
        return $this->report->getReport();
    }
}
