<?php

namespace OOP\Structural\Flyweight;

/**
 * A Flyweight class for storing logo of a page.
 */
class PageType
{
    /**
     * Stores a logo contents.
     * @var string
     */
    private $logo;
    private $type;

    public function __construct(string $type, string $logo)
    {
        $this->logo = $logo;
        $this->type = $type;
    }

    public function renderPage($header, $content, $footer): string
    {
        return implode(PHP_EOL, [$this->logo, $header, $content, $footer]);
    }

    /**
     * Get the value of logo.
     *
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Get the value of Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}
