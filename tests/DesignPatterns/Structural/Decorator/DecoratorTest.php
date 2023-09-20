<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Decorator;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Decorator\Ring;
use GrowthCode\DesignPatterns\Structural\Decorator\DiamondDecorator;
use GrowthCode\DesignPatterns\Structural\Decorator\GoldDecorator;

final class DecoratorTest extends TestCase
{
    public function testingWithDiamondsAndGold(): void
    {
        $ring = new Ring();
        $diamondRing = new DiamondDecorator($ring);
        $goldDiamondRing = new GoldDecorator($diamondRing);

        $this->assertEquals(180.0, $goldDiamondRing->cost());
        $this->assertEquals('An elegant ring with diamonds with gold', $goldDiamondRing->description());
    }
}
