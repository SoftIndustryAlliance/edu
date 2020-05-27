<?php

namespace OOP\Behavioral\Visitor;

/**
 * Interface for a Component object.
 */
interface Component
{
    public function accept(ReportVisitor $visitor): void;
}
