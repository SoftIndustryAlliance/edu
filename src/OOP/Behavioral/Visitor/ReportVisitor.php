<?php

namespace OOP\Behavioral\Visitor;

/**
 * Interface for a Visitor object.
 */
interface ReportVisitor
{
    public function visitHeader(Header $header): void;
    public function visitContent(Content $content): void;
}
