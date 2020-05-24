<?php

namespace OOP\Behavioral\Memento;

/**
 * This is the Origincator class for the Memento pattern.
 */
class Report
{
    private $header;
    private $content;
    private $footer;
    private $key;

    public function generate(int $key)
    {
        $this->key = $key;
        $this->header = 'Header for key '.$key.PHP_EOL;
        $this->content = 'Content for key '.$key.PHP_EOL;
        $this->footer = 'Footer for key '.$key.PHP_EOL;
    }

    public function getReport(): string
    {
        return $this->header.$this->content.$this->footer;
    }

    public function save(): Memento
    {
        return new ReportMemento($this->key, $this->header, $this->content, $this->footer);
    }

    public function restore(Memento $memento): void
    {
        $this->key = $memento->getKey();
        $this->header = $memento->getHeader();
        $this->content = $memento->getContent();
        $this->footer = $memento->getFooter();
    }
}
