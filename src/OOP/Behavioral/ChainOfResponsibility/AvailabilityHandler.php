<?php

namespace OOP\Behavioral\ChainOfResponsibility;

/**
 * Availability handler that checks if report exists.
 */
class AvailabilityHandler extends AbstractHandler
{
    public function handleRequest(Request $request): bool
    {
        if ($request->getReportKey() > 10000) {
            // no report found
            return false;
        }

        return parent::handleRequest($request);
    }
}
