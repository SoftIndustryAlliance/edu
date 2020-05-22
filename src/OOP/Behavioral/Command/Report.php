<?php

namespace OOP\Behavioral\Command;

/**
 * This is a Receiver class.
 */
class Report implements Generatable, ReportInterface
{
    private $key;
    private $content = '';
    private $showHeader = false;

    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function generate(): bool
    {
        if (!$this->key) {
            return false;
        }
        $this->content = '';

        if ($this->showHeader) {
            $this->content .= 'Report header'.PHP_EOL;
        }
        $this->content .= 'Report content '.$this->key;

        return true;
    }

    public function showHeader(bool $showHeader)
    {
        $this->showHeader = $showHeader;
    }

    public function printOut(): string
    {
        return $this->content;
    }
}
