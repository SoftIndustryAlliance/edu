<?php

namespace OOP\Structural\Facade;

/**
 * A report facade class.
 */
class ReportFacade implements Facade
{
    protected $report;
    protected $header;
    protected $content;
    protected $footer;

    public function __construct()
    {
        $this->report = new Report();
        $this->header = new Header();
        $this->content = new Content();
        $this->footer = new Footer();
    }

    private function prepareReport(int $key): void
    {
        $this->header->addContent('Header for '.$key);
        $this->content->addContent('Content for '.$key);
        $this->footer->addContent('Footer for '.$key);
        $this->report->setHeader($this->header);
        $this->report->setContent($this->content);
        $this->report->setFooter($this->footer);
    }

    public function getReport(int $key): string
    {
        $this->prepareReport($key);

        return $this->report->getReport();
    }
}
