<?php

namespace OOP\Structural\Proxy;

/**
 * A Proxy class that stores generated report in a file.
 */
class ReportProxy implements Report
{
    private $reports = [];

    public function generateReport(int $key): string
    {
        if (!isset($this->reports[$key])) {
            $report = new BigReport();
            $generatedReport = $report->generateReport($key);

            // save the report contents to a file here
            $this->reports[$key] = '/tmp/report_'.$key.'.pdf';
        }
        // Load from file and return
        return $this->reports[$key];
    }
}
