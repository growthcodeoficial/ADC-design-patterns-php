<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\Singleton;

use Error;
use LogicException;
use GrowthCode\DesignPatterns\Creational\Singleton\President;
use PHPUnit\Framework\TestCase;

final class PresidentTest extends TestCase
{
    public function testInstancesShouldBeIdentical(): void
    {
        $firstInstance = President::getInstance();
        $secondInstance = President::getInstance();
        $this->assertSame($firstInstance, $secondInstance);
    }

    public function testInstantiationShouldThrowError(): void
    {
        $this->expectException(Error::class);
        $instance = new President();
    }

    public function testCloningShouldThrowError(): void
    {
        $this->expectException(Error::class);
        $instance = President::getInstance();
        $clone = clone $instance;
    }

    public function testSerializationShouldThrowLogicException(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Cannot serialize a President.');
        $instance = President::getInstance();
        $serialize = serialize($instance);
    }

    public function testUnserializationShouldThrowLogicException(): void
    {
        $this->expectException(LogicException::class);
        $instance = President::getInstance();
        $serialize = serialize($instance);
        $unserialize = unserialize($serialize);
    }
}
