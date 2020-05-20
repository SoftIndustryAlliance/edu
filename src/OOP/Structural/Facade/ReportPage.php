<?php

namespace OOP\Structural\Facade;

/**
 * A client report page class to use Facade.
 */
class ReportPage
{
    private $facade;

    public function __construct(ReportFacade $facade)
    {
        $this->facade = $facade;
    }

    public function getPageContent(int $key): string
    {
        return $this->facade->getReport($key);
    }
}
