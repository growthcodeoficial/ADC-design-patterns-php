<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

// Originator
class Person
{
    private array $memories = [];

    public function addMemory(string $memory): void
    {
        $this->memories[] = $memory;
    }

    public function save(): Memory
    {
        return new Memory($this->memories);
    }

    public function restore(Memory $memory): void
    {
        $this->memories = $memory->getState();
    }
}
