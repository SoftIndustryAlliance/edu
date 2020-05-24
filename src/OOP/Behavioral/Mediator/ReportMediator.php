<?php

namespace OOP\Behavioral\Mediator;

/**
 * Mediator object.
 */
class ReportMediator implements Mediator
{
    private $header;
    private $content;
    private $footer;
    private $report;

    public function notify(object $sender, string $event): void
    {
        switch ($event) {
            case 'headerReady':
                $this->report->setHeader($sender->getHeader());
                break;
            case 'contentReady':
                $this->report->setContent($sender->getContent());
                break;
            case 'footerReady':
                $this->report->setFooter($sender->getFooter());
                break;
            case 'reportReady':
                // Send report somewhere
                break;
        }
    }

    public function generateReport(int $key)
    {
        $this->header->generate($key);
        $this->content->generate($key);
        $this->footer->generate($key);
    }

    public function getReport()
    {
        return $this->report->getReport();
    }

    public function setHeader(Header $header): ReportMediator
    {
        $this->header = $header;
        $this->header->setMediator($this);

        return $this;
    }

    public function setContent(Content $content): ReportMediator
    {
        $this->content = $content;
        $this->content->setMediator($this);

        return $this;
    }

    public function setFooter(Footer $footer): ReportMediator
    {
        $this->footer = $footer;
        $this->footer->setMediator($this);

        return $this;
    }

    public function setReport(Report $report): ReportMediator
    {
        $this->report = $report;
        $this->report->setMediator($this);

        return $this;
    }
}
