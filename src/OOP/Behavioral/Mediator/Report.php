<?php

namespace OOP\Behavioral\Mediator;

class Report extends Colleague
{
    private $header;
    private $content;
    private $footer;
    private $report;

    public function generate()
    {
        if ($this->header && $this->content && $this->footer) {
            $this->report = $this->header.$this->content.$this->footer;
            $this->mediator->notify($this, 'reportReady');
        }
    }

    public function getReport(): string
    {
        return $this->report;
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
     * Set the value of Header
     *
     * @param mixed $header
     *
     * @return self
     */
    public function setHeader($header)
    {
        $this->header = $header;
        $this->generate();

        return $this;
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
     * Set the value of Content
     *
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        $this->generate();

        return $this;
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

    /**
     * Set the value of Footer
     *
     * @param mixed $footer
     *
     * @return self
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        $this->generate();

        return $this;
    }
}
