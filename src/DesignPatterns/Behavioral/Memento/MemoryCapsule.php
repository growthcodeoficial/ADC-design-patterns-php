<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

// Memento
class MemoryCapsule
{
    private string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state;
    }
}
