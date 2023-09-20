<?php

namespace GrowthCode\DesignPatterns\Behavioral\Strategy;

class SiegeStrategy implements BattleStrategy
{
    public function execute(): string
    {
        return "Cerco ao inimigo. Corte seus suprimentos!";
    }
}
