<?php

namespace OOP\Behavioral\Strategy;

class Report
{
    private $strategy;

    public function __construct(ReportStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;

        return $this;
    }

    public function getContent(int $key): string
    {
        return $this->strategy->generateContent($key);
    }
}
