<?php

namespace OOP\Behavioral\Strategy;

/**
 * Interface for a Simple Report content.
 */
class SimpleReport implements ReportStrategy
{
    public function generateContent(int $key): string
    {
        return 'Simple report content for key '.$key.PHP_EOL;
    }
}
