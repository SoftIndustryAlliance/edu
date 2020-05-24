<?php

namespace OOP\Behavioral\Memento;

/**
 * This is the Caretaker class for the Memento pattern.
 */
class ReportCaretaker
{
    private $mementos = [];
    private $originator;

    public function __construct(Report $originator)
    {
        $this->originator = $originator;
    }

    public function backup()
    {
        $this->mementos[] = $this->originator->save();
    }

    public function undo(): void
    {
        if (empty($this->mementos)) {
            return;
        }
        $memento = array_pop($this->mementos);

        $this->originator->restore($memento);
    }
}
