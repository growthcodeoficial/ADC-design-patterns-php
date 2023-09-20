<?php

namespace GrowthCode\DesignPatterns\Behavioral\Command;

// ConcreteCommand
class DefendCommand implements Command
{
    public function execute(): string
    {
        return "Defend!\n";
    }
}
