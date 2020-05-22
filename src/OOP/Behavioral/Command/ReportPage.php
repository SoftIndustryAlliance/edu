<?php

namespace OOP\Behavioral\Command;

/**
 * This is an Invoker class.
 */
class ReportPage
{
    private $report;
    private $generateCommand;
    private $enableHeaderCommand;

    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function setGenerateCommand(Command $command)
    {
        $this->generateCommand = $command;
    }

    public function setEnableHeaderCommand(Command $command)
    {
        $this->enableHeaderCommand = $command;
    }

    public function show(bool $withHeader): string
    {
        if ($withHeader) {
            $this->enableHeaderCommand->execute();
        }
        $this->generateCommand->execute();
        return $this->report->printOut();
    }
}
