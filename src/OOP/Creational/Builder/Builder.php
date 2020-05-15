<?php

namespace OOP\Creational\Builder;

/**
 * Builder interface for report building.
 */
interface Builder
{
    public function setKey(int $key): Builder;
    public function buildPager(): Builder;
    public function buildHeader(): Builder;
    public function buildContent(): Builder;
    public function buildFooter(): Builder;
    public function getReport(): Report;
}
