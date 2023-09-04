<?php

namespace GrowthCode\DesignPatterns\Behavioral\Memento;

// Memento
class Memory
{
    private array $state;

    public function __construct(array $state)
    {
        $this->state = $state;
    }

    public function getState(): array
    {
        return $this->state;
    }
}
