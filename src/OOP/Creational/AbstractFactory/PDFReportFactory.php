<?php

namespace OOP\Creational\AbstractFactory;

/**
 * PDF Report Factory implementation.
 */
class PDFReportFactory implements ReportFactory
{
    public function getBuilder(): ReportBuilder
    {
        return new PDFReport();
    }
}
