<?php

namespace OOP\Structural\Adapter;

/**
 * A client class that generates and sends reports using Sender.
 */
class Report
{
    private $sender = null;
    private $clientId;
    private $path;

    public function __construct(?Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Create a report in a temporary path.
     */
    public function createReport(int $clientId)
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
        if ($this->sender === null) {
            return false;
        }
        return $this->sender->sendReport($this->path, $this->clientId);
    }

    /**
     * Get the value of A client class that generates and sends reports using Sender.
     *
     * @return mixed
     */
    public function getSender(): Sender
    {
        return $this->sender;
    }

    /**
     * Set the value of A client class that generates and sends reports using Sender.
     *
     * @param mixed $sender
     *
     * @return self
     */
    public function setSender(Sender $sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the value of Client Id
     *
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of Client Id
     *
     * @param mixed $clientId
     *
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }
}
