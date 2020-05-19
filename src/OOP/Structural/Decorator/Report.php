<?php

namespace OOP\Structural\Decorator;

/**
 * Common interface for Report objects.
 */
interface Report
{
    public function setHeader(string $header): Report;
    public function setContent(string $content): Report;
    public function setFooter(string $footer): Report;
    public function getReport(): string;
}
