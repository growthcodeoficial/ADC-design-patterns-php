<?php

namespace GrowthCode\DesignPatterns\Behavioral\Strategy;

class AttackStrategy implements BattleStrategy
{
    public function execute(): string
    {
        return "Ataque direto ao inimigo!";
    }
}
