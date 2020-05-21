<?php

namespace OOP\Behavioral\ChainOfResponsibility;

/**
 * Access handler that checks access to a report.
 */
class AccessHandler extends AbstractHandler
{
    public function handleRequest(Request $request): bool
    {
        if ($request->getEmail() !== 'admin@report.io') {
            // deny access
            return false;
        }

        return parent::handleRequest($request);
    }
}
