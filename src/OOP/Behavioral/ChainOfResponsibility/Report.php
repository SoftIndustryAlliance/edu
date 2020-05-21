<?php

namespace OOP\Behavioral\ChainOfResponsibility;

class Report
{
    private $handler;

    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function getReport(Request $request): ?string
    {
        if ($this->handler->handleRequest($request)) {
            return 'Report for key '.$request->getReportKey().PHP_EOL;
        }

        return null;
    }
}
