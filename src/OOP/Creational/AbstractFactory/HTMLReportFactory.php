<?php

namespace OOP\Creational\AbstractFactory;

/**
 * HTML Report Factory implementation.
 */
class HTMLReportFactory implements ReportFactory
{
    public function getBuilder(): ReportBuilder
    {
        return new HTMLReport();
    }
}
