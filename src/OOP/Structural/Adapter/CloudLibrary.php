<?php

namespace OOP\Structural\Adapter;

/**
 * A cool Cloud library to store reports.
 */
class CloudLibrary
{
    public function save(string $localPath, string $remotePath): bool
    {
        $log = 'Saving file '.$localPath.' to the cloud storage '.$remotePath;
        return true;
    }
}
