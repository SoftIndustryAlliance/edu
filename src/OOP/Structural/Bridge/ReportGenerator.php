<?php

namespace OOP\Structural\Bridge;

/**
 * A client class that generates and sends reports using Sender.
 */
class ReportGenerator extends Report
{
    /**
     * Create a report in a temporary path.
     */
    public function createReport(int $clientId): Report
    {
        $this->clientId = $clientId;
        $this->path = '/tmp/reports/'.$this->clientId;

        return $this;
    }

    /**
     * Send report using the passed in Sender.
     */
    public function send(): bool
    {
        return $this->sender->sendReport($this->path, $this->clientId);
    }
}
