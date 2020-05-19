<?php

namespace OOP\Structural\Adapter;

/**
 * Interface used by client class to send generated reports.
 */
interface Sender
{
    public function sendReport(string $path, int $clientId): bool;
}
