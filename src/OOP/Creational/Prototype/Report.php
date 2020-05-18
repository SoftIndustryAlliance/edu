<?php

namespace OOP\Creational\Prototype;

class Report
{
    protected $key;

    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function getPageContent(int $pageNumber)
    {
        return 'Report id='.$this->key.'. Content for page number '.$pageNumber;
    }
}
