<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\Singleton;

use Error;
use LogicException;
use GrowthCode\DesignPatterns\Creational\Singleton\President;
use PHPUnit\Framework\TestCase;

final class PresidentTest extends TestCase
{
    public function testShouldBeTheSameInstanceForTwoObjets(): void
    {
        $firstInstance = President::getInstance();
        $secondInstance = President::getInstance();
        $this->assertSame($firstInstance, $secondInstance);
    }

    public function testShouldThrowErrorWhenTryToCreateInstance(): void
    {
        $this->expectException(Error::class);
        $instance = new President();
    }

    public function testShouldThrowErrorWhenTryToClone(): void
    {
        $this->expectException(Error::class);
        $instance = President::getInstance();
        $clone = clone $instance;
    }

    public function testShouldThrowExceptionWhenTryToSerialize(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Cannot serialize a President.');
        $instance = President::getInstance();
        $serialize = serialize($instance);
    }

    public function testShouldThrowExceptionWhenTryToUnserialize(): void
    {
        $this->expectException(LogicException::class);
        $instance = President::getInstance();
        $serialize = serialize($instance);
        $unserialize = unserialize($serialize);
    }
}
