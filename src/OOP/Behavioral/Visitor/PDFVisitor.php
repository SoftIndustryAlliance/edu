<?php

namespace OOP\Behavioral\Visitor;

/**
 * PDF Visitor object.
 */
class PDFVisitor implements ReportVisitor
{
    public function visitHeader(Header $header): void
    {
        $header->setContent('PDF header content for key '.$header->getKey().PHP_EOL);
    }

    public function visitContent(Content $content): void
    {
        $content->setContent('PDF main content for key '.$content->getKey().PHP_EOL);
    }
}
