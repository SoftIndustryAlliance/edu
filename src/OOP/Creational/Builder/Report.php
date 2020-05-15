<?php

namespace OOP\Creational\Builder;

/**
 * A basic report class.
 */
class Report
{
    private $key;
    private $pager;
    private $header;
    private $content;
    private $footer;

    public function __construct(?int $key = null)
    {
        $this->key = $key;
    }

    public function printReport(): string
    {
        return $this->pager.$this->header.$this->content.$this->footer;
    }

    /**
     * Get the value of A basic report class.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of A basic report class.
     *
     * @param mixed $key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of Pager
     *
     * @return mixed
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * Set the value of Pager
     *
     * @param mixed $pager
     *
     * @return self
     */
    public function setPager($pager)
    {
        $this->pager = $pager;

        return $this;
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

        return $this;
    }
}
