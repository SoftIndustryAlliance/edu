<?php

namespace OOP\Behavioral\Memento;

/**
 * Report Memento implementation object.
 */
class ReportMemento implements Memento
{
    private $key;
    private $date;
    private $header;
    private $content;
    private $footer;

    public function __construct($key, $header, $content, $footer)
    {
        $this->key = $key;
        $this->header = $header;
        $this->content = $content;
        $this->footer = $footer;
        $this->date = date("Y-m-d H:i:s");
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get the value of Header
     *
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the value of Footer
     *
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }
}
