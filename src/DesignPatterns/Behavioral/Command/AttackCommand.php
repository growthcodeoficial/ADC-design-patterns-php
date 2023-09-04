<?php

namespace GrowthCode\DesignPatterns\Behavioral\Command;

// ConcreteCommand
class AttackCommand implements Command
{
    public function execute(): string
    {
        return "Attack!\n";
    }
}
