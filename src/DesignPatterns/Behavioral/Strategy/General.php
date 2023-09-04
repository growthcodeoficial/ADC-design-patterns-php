<?php

namespace GrowthCode\DesignPatterns\Behavioral\Strategy;

class General
{
    private BattleStrategy $strategy;

    public function __construct(BattleStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(BattleStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function makeDecision(): string
    {
        return $this->strategy->execute();
    }
}
