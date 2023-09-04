<?php

namespace GrowthCode\DesignPatterns\Behavioral\Strategy;

class RetreatStrategy implements BattleStrategy
{
    public function execute(): string
    {
        return "Retirada estratégica.";
    }
}
