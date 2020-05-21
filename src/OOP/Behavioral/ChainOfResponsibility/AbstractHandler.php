<?php

namespace OOP\Behavioral\ChainOfResponsibility;

/**
 * Abstract handler with basic functionality.
 */
abstract class AbstractHandler implements Handler
{
    private $nextHandler;

    public function nextHandler(Handler $handler): Handler
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handleRequest(Request $request): bool
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handleRequest($request);
        }

        return true;
    }
}
