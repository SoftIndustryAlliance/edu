<?php

namespace OOP\Creational\Prototype;

/**
 * A class for the Prototype pattern.
 */
class ReportPage
{
    protected $report;
    protected $title;
    protected $content;
    protected $footer;
    protected $pageNumber;

    public function __construct(Report $report)
    {
        $this->report = $report;
        $this->pageNumber = 0;
    }

    public function __clone()
    {
        $this->pageNumbner = $this->pageNumber++;
        $this->content = $this->report->getPageContent($this->pageNumber);
    }

    public function printPage(): string
    {
        return $this->title.PHP_EOL.$this->content.PHP_EOL.$this->footer.PHP_EOL.$this->pageNumber.PHP_EOL;
    }

    /**
     * Get the value of A class for the Prototype pattern.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of A class for the Prototype pattern.
     *
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Get the value of Page Number
     *
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * Set the value of Page Number
     *
     * @param mixed $pageNumber
     *
     * @return self
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }
}
