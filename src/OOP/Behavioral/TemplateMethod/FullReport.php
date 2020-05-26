<?php

namespace OOP\Behavioral\TemplateMethod;

/**
 * Concrete class for Report's Template Method object.
 */
class FullReport extends Report
{
    protected function getHeader(int $key): string
    {
        return 'Full report header for key '.$key.PHP_EOL;
    }

    protected function getContent(int $key): string
    {
        return 'Full report content for key '.$key.PHP_EOL;
    }

    protected function getFooter(int $key): string
    {
        return 'Full report footer for key '.$key.PHP_EOL;
    }
}
