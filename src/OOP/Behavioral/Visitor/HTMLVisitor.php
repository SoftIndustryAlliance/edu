<?php

namespace OOP\Behavioral\Visitor;

/**
 * HTML Visitor object.
 */
class HTMLVisitor implements ReportVisitor
{
    public function visitHeader(Header $header): void
    {
        $header->setContent('HTML header content for key '.$header->getKey().PHP_EOL);
    }

    public function visitContent(Content $content): void
    {
        $content->setContent('HTML main content for key '.$content->getKey().PHP_EOL);
    }
}
