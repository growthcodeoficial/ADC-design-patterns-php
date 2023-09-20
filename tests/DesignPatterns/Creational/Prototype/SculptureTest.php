<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\Prototype;

use GrowthCode\DesignPatterns\Creational\Prototype\ConcreteSculpture;
use PHPUnit\Framework\TestCase;

final class SculptureTest extends TestCase
{
    public function testCloneIsDifferentObjectButSameData(): void
    {
        $original = new ConcreteSculpture('marble');
        $clone = $original->clone();

        $this->assertNotSame($original, $clone);
        $this->assertEquals($original->material, $clone->material);
    }
}
