<?php

namespace OOP\Structural\Facade;

interface Component
{
    public function addContent(string $content): Component;
    public function getContent(): string;
}
