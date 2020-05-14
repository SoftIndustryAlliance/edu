<?php

namespace OOP\Creational\AbstractFactory;

/**
 * Factory interface for getting report builders.
 */
interface ReportFactory
{
    public function getBuilder(): ReportBuilder;
}
