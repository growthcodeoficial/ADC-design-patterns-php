<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Command;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Command\CommandCenter;
use GrowthCode\DesignPatterns\Behavioral\Command\MilitaryCommander;

final class CommandTest extends TestCase
{
    public function testCommandCenter(): void
    {
        $commander = new MilitaryCommander();
        $commandCenter = new CommandCenter($commander);

        // Inicia comandos através do CommandCenter
        $commandCenter->initiateAttack();
        $commandCenter->initiateDefense();

        // Verifica se a saída é a esperada
        $this->expectOutputString("Attack!\nDefend!\n");
        $commandCenter->executeOperations();
    }
}
