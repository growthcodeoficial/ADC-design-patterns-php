<?php

namespace GrowthCode\DesignPatterns\Behavioral\State;

// Context
class Chameleon
{
    private ChameleonState $state;

    public function __construct(ChameleonState $initialState)
    {
        $this->state = $initialState;
    }

    public function setState(ChameleonState $state): void
    {
        $this->state = $state;
    }

    public function getState(): ChameleonState
    {
        return  $this->state;
    }

    public function changeColor(): void
    {
        $this->state->changeColor($this);
    }
}
