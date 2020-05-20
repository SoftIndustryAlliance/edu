<?php

namespace OOP\Structural\Proxy;

/**
 * Interface to be implemented by a report and a proxy.
 */
interface Report
{
    public function generateReport(int $key): string;
}
