<?php

namespace OOP\Behavioral\Strategy;

/**
 * Interface for a Strategy object.
 */
interface ReportStrategy
{
    public function generateContent(int $key): string;
}
