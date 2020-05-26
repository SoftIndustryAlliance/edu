<?php

namespace OOP\Behavioral\Strategy;

/**
 * Interface for a Full Report content.
 */
class FullReport implements ReportStrategy
{
    public function generateContent(int $key): string
    {
        return 'Full report content for key '.$key.PHP_EOL;
    }
}
