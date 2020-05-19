<?php

namespace OOP\Structural\Adapter;

/**
 * Adapter class to implement the needed Sender interfase.
 */
class CloudLibraryToSenderAdapter implements Sender
{
    protected $cloudLibrary;

    public function __construct(CloudLibrary $cloudLibrary)
    {
        $this->cloudLibrary = $cloudLibrary;
    }

    /**
     * Send report using cloud.
     */
    public function sendReport(string $path, int $clientId): bool
    {
        $privatePath = '/private/'.$clientId.'/reports';
        $this->cloudLibrary->save($path, $privatePath);
        $log = 'Saving report from '.$path.' to cloud path '.$privatePath;
        return true;
    }
}
