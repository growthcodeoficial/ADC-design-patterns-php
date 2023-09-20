<?php

namespace GrowthCode\DesignPatterns\Behavioral\Command;

use SplQueue;

// Invoker
class MilitaryCommander
{
    private SplQueue $commands;

    public function __construct()
    {
        $this->commands = new SplQueue();
    }

    public function addCommand(Command $command): void
    {
        $this->commands->enqueue($command);
    }

    public function executeCommands(): void
    {
        foreach ($this->commands as $command) {
            echo $command->execute();
        }
    }
}
