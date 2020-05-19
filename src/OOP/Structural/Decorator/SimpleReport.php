<?php

namespace OOP\Structural\Decorator;

/**
 * A simple report class that needs enhancement.
 */
class SimpleReport implements Report
{
    private $header;
    private $content;
    private $footer;

    public function setHeader(string $header): Report
    {
        $this->header = 'Simple report '.$header.PHP_EOL;

        return $this;
    }

    public function setContent(string $content): Report
    {
        $this->content = 'Simple report '.$content.PHP_EOL;

        return $this;
    }

    public function setFooter(string $footer): Report
    {
        $this->footer = 'Simple report '.$footer.PHP_EOL;

        return $this;
    }

    public function getReport(): string
    {
        return $this->header.$this->content.$this->footer;
    }
}
