<?php

namespace OOP\Creational\FactoryMethod;

/**
 * A class for the HTML Report page.
 */
class HTMLReportPage extends ReportPage
{
    public function makeReport(): ReportPage
    {
        $this->report = new HTMLReport();
        return $this;
    }
}
