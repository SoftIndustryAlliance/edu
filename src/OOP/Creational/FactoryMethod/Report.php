<?php

namespace OOP\Creational\FactoryMethod;

/**
 * Abstract class to generate a report of a type.
 */
abstract class Report
{
    const TYPE = self::TYPE;

    public function generate(int $key): string
    {
        return 'This is a '.static::TYPE.' report builder for key '.$key.PHP_EOL;
    }
}
