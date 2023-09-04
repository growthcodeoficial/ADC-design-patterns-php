<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

use SplStack;

// O Caretaker
class MemoryLibrary
{
    private SplStack $savedMemories;

    public function __construct()
    {
        $this->savedMemories = new SplStack();
    }

    public function saveMemory(Memory $memory): void
    {
        $this->savedMemories->push($memory);
    }

    public function getLastMemory(): Memory
    {
        return $this->savedMemories->pop();
    }
}
