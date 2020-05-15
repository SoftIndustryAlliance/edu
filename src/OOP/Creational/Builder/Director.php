<?php

namespace OOP\Creational\Builder;

/**
 * Director class to control builders.
 */
class Director
{
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function constructReport(int $key): Report
    {
        return $this->builder->setKey($key)
            ->buildPager()
            ->buildHeader()
            ->buildContent()
            ->buildFooter()
            ->getReport();
    }
}
