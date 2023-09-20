<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\FactoryMethod;

use GrowthCode\DesignPatterns\Creational\FactoryMethod\DanceFactory;
use GrowthCode\DesignPatterns\Creational\FactoryMethod\SingingFactory;
use PHPUnit\Framework\TestCase;

final class FactoryMethodTest extends TestCase
{
    public function testDanceFactory(): void
    {
        $factory = new DanceFactory();
        $performance = $factory->showPerformance();

        $this->assertEquals('Dancing gracefully!', $performance);
    }

    public function testSingingFactory(): void
    {
        $factory = new SingingFactory();
        $performance = $factory->showPerformance();

        $this->assertEquals('Singing melodiously!', $performance);
    }
}
