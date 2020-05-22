<?php

namespace OOP\Behavioral\Command;

/**
 * Command class to run a generate request.
 */
class GenerateCommand implements Command
{
    /** @var Generatable **/
    private $receiver;

    public function __construct(Generatable $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute(): void
    {
        $this->receiver->generate();
    }
}
