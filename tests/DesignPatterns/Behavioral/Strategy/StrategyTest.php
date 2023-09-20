<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Strategy;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Strategy\AttackStrategy;
use GrowthCode\DesignPatterns\Behavioral\Strategy\SiegeStrategy;
use GrowthCode\DesignPatterns\Behavioral\Strategy\RetreatStrategy;
use GrowthCode\DesignPatterns\Behavioral\Strategy\General;

final class StrategyTest extends TestCase
{
    public function testStrategyPattern(): void
    {
        $general = new General(new AttackStrategy());
        $this->assertSame('Ataque direto ao inimigo!', $general->makeDecision());

        $general->setStrategy(new SiegeStrategy());
        $this->assertSame('Cerco ao inimigo. Corte seus suprimentos!', $general->makeDecision());

        $general->setStrategy(new RetreatStrategy());
        $this->assertSame('Retirada estratégica.', $general->makeDecision());
    }
}
