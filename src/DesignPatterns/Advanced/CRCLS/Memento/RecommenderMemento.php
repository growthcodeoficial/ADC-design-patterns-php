<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Memento;

final class RecommenderMemento
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
