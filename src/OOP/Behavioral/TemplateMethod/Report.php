<?php

namespace OOP\Behavioral\TemplateMethod;

/**
 * Abstract class for Report's Template Method object.
 */
abstract class Report
{
    protected $content;
    protected $key;

    public function __construct(int $key)
    {
        $this->key = $key;
    }

    /**
     * This is a template method.
     */
    public function generate()
    {
        $this->content = $this->getHeader($this->key);
        $this->content .= $this->getContent($this->key);
        $this->content .= $this->getFooter($this->key);
    }

    public function getReport(): string
    {
        return $this->content;
    }

    abstract protected function getHeader(int $key): string;
    abstract protected function getContent(int $key): string;
    abstract protected function getFooter(int $key): string;
}
