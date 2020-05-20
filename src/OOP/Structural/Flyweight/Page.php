<?php

namespace OOP\Structural\Flyweight;

/**
 * A Context class which uses the Flyweight object.
 */
class Page
{
    private $header;
    private $content;
    private $footer;

    /** @var PageType - a reference to Flyweight object **/
    private $pageType;

    public function __construct(string $header, string $content, string $footer, PageType $pageType)
    {
        $this->header = $header;
        $this->content = $content;
        $this->footer = $footer;
        $this->pageType = $pageType;
    }

    public function render(): string
    {
        return $this->pageType->renderPage($this->header, $this->content, $this->footer);
    }

    /**
     * Get the value of A Context class which uses the Flyweight object.
     *
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set the value of A Context class which uses the Flyweight object.
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

    /**
     * Get the value of Page Type
     *
     * @return mixed
     */
    public function getPageType()
    {
        return $this->pageType;
    }

    /**
     * Set the value of Page Type
     *
     * @param mixed $pageType
     *
     * @return self
     */
    public function setPageType($pageType)
    {
        $this->pageType = $pageType;

        return $this;
    }
}
