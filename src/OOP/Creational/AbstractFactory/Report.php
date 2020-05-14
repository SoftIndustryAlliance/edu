<?php

namespace OOP\Creational\AbstractFactory;

/**
 * A client class for the Abstract Factory pattern.
 */
class Report
{
    private $factory;

    public function __construct(ReportFactory $factory)
    {
        $this->factory = $factory;
    }

    public function printReport(int $key): string
    {
        return $this->factory->getBuilder()->generate($key);
    }
}
