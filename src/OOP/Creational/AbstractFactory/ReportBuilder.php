<?php

namespace OOP\Creational\AbstractFactory;

/**
 * Abstract class to build a report of a type.
 */
abstract class ReportBuilder
{
    const TYPE = self::TYPE;

    public function generate(int $key): string
    {
        return 'This is a '.static::TYPE.' report builder for key '.$key.PHP_EOL;
    }
}
