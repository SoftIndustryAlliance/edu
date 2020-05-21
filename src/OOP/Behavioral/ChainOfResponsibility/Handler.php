<?php

namespace OOP\Behavioral\ChainOfResponsibility;

/**
 * Interface to be implemented by handlers.
 */
interface Handler
{
    public function nextHandler(Handler $handler): Handler;
    public function handleRequest(Request $request): bool;
}
