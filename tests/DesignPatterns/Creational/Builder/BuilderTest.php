<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\Builder;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Creational\Builder\WholeGrainBread;
use GrowthCode\DesignPatterns\Creational\Builder\WholeGrainBreadBuilder;
use GrowthCode\DesignPatterns\Creational\Builder\BreadDirector;

final class BuilderTest extends TestCase
{
    public function testWholeGrainBread(): void
    {
        $builder = new WholeGrainBreadBuilder();
        $director = new BreadDirector($builder);

        $bread = $director->buildBread();

        $this->assertInstanceOf(WholeGrainBread::class, $bread);
        $this->assertEquals('Active Yeast + Sea Salt', $bread->taste());
    }
}
