<?php

namespace OOP\Structural\Facade;

/**
 * A report class.
 */
class Report
{
    private $header;
    private $content;
    private $footer;

    public function setHeader(Component $header): Report
    {
        $this->header = $header;

        return $this;
    }

    public function setContent(Component $content): Report
    {
        $this->content = $content;

        return $this;
    }

    public function setFooter(Component $footer): Report
    {
        $this->footer = $footer;

        return $this;
    }

    public function getReport(): string
    {
        return $this->header->getContent().$this->content->getContent().$this->footer->getContent();
    }
}
