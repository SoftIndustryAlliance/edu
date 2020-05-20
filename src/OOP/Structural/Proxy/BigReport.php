<?php

namespace OOP\Structural\Proxy;

/**
 * Some big report class that is heavy to generate.
 */
class BigReport implements Report
{
    public function __construct()
    {
        // Some heavy init here.
    }

    public function generateReport(int $key): string
    {
        return 'A big report for '.$key.PHP_EOL;
    }
}
