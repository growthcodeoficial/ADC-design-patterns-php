<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

// Originator
class Person
{
    private string $state;

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function saveToMemoryCapsule(): MemoryCapsule
    {
        return new MemoryCapsule($this->state);
    }

    public function restoreFromMemoryCapsule(MemoryCapsule $memoryCapsule): void
    {
        $this->state = $memoryCapsule->getState();
    }
}
