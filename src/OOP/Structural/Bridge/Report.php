<?php

namespace OOP\Structural\Bridge;

/**
 * A client abstract class that generates and sends reports using Sender.
 */
abstract class Report
{
    /** @var Sender - this is the Bridge to concrete send implementations **/
    protected $sender;

    protected $clientId;
    protected $path;

    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * Create a report in a temporary path.
     */
    abstract public function createReport(int $clientId): Report;

    /**
     * Send report using the passed in Sender.
     */
    abstract public function send(): bool;

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
