<?php

namespace OOP\Structural\Adapter;

/**
 * File sender that stores a report in a private directory.
 */
class FileSender implements Sender
{
    public function sendReport(string $path, int $clientId): bool
    {
        $privatePath = '/private/'.$clientId.'/reports';
        $log = 'Saving report from '.$path.' to private local path '.$privatePath;
        return true;
    }
}
