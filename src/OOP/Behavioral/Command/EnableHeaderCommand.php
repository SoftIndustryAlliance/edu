<?php

namespace OOP\Behavioral\Command;

/**
 * Command class to enable header on report.
 * TODO: implement undo() method
 */
class EnableHeaderCommand implements Command
{
    private $receiver;

    public function __construct(ReportInterface $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(): void
    {
        $this->receiver->showHeader(true);
    }
}
