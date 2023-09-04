<?php

namespace GrowthCode\DesignPatterns\Behavioral\Command;

// Client
class CommandCenter
{
    private MilitaryCommander $militaryCommander;

    public function __construct(MilitaryCommander $militaryCommander)
    {
        $this->militaryCommander = $militaryCommander;
    }

    public function initiateAttack(): void
    {
        $attackCommand = new AttackCommand();
        $this->militaryCommander->addCommand($attackCommand);
    }

    public function initiateDefense(): void
    {
        $defendCommand = new DefendCommand();
        $this->militaryCommander->addCommand($defendCommand);
    }

    public function executeOperations(): void
    {
        $this->militaryCommander->executeCommands();
    }
}
