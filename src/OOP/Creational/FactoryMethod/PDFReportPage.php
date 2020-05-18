<?php

namespace OOP\Creational\FactoryMethod;

/**
 * A class for the PDF Report page.
 */
class PDFReportPage extends ReportPage
{
    public function makeReport(): ReportPage
    {
        $this->report = new PDFReport();
        return $this;
    }
}
