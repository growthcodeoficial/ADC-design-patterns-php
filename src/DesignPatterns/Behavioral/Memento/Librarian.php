<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

use SplStack;

// O Caretaker
class Librarian
{
    private SplStack $savedMemoryCapsules;

    public function __construct()
    {
        $this->savedMemoryCapsules = new SplStack();
    }

    public function addMemoryCapsule(MemoryCapsule $memoryCapsule): void
    {
        $this->savedMemoryCapsules->push($memoryCapsule);
    }

    public function getMemoryCapsule(): ?MemoryCapsule
    {
        return $this->savedMemoryCapsules->isEmpty() ? null : $this->savedMemoryCapsules->pop();
    }
}
