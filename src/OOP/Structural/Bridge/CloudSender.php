<?php

namespace OOP\Structural\Bridge;

/**
 * File sender that stores a report in a cloud.
 */
class CloudSender implements Sender
{
    public function sendReport(string $path, int $clientId): bool
    {
        $privatePath = '/private/'.$clientId.'/reports';
        $log = 'Saving report from '.$path.' to a cloud path '.$privatePath;
        return true;
    }
}
