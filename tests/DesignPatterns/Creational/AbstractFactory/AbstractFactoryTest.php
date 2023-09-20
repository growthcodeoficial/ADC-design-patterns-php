<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\AbstractFactory;

use GrowthCode\DesignPatterns\Creational\AbstractFactory\EuropeanGardenFactory;
use PHPUnit\Framework\TestCase;

final class AbstractFactoryTest extends TestCase
{
    public function testEuropeanGardenFactory(): void
    {
        $factory = new EuropeanGardenFactory();

        $flower = $factory->createFlower();
        $this->assertEquals('Aromatic!', $flower->smell());

        $tree = $factory->createTree();
        $this->assertEquals('Tall!', $tree->height());
    }
}
