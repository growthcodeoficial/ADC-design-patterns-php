<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Flyweight;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Flyweight\SquareFactory;
use GrowthCode\DesignPatterns\Structural\Flyweight\UnsharedSquare;
use GrowthCode\DesignPatterns\Structural\Flyweight\SquareClient;

final class FlyweightTest extends TestCase
{
    public function testFlyweightPattern(): void
    {
        $factory = new SquareFactory();

        $square1 = $factory->getSquare('red');
        $square2 = $factory->getSquare('red');
        $square3 = $factory->getSquare('blue');

        // Test if two squares with the same color are actually the same object
        $this->assertSame($square1, $square2);

        // Test if two squares with different colors are different objects
        $this->assertNotSame($square1, $square3);

        // Test rendering of square
        $this->assertEquals('Rendered a red square at position 1,1.', $square1->render('1,1'));

        // Test UnsharedSquare
        $unsharedSquare1 = new UnsharedSquare('unique1');
        $unsharedSquare2 = new UnsharedSquare('unique2');

        // Test if two unshared squares are actually different objects
        $this->assertNotSame($unsharedSquare1, $unsharedSquare2);

        // Test rendering of unshared square
        $this->assertEquals('Rendered an unshared square at position 1,1, unique attribute: unique1.', $unsharedSquare1->render('1,1'));

        // Test SquareClient
        $client = new SquareClient($factory);
        $this->expectOutputString(
            "Rendered a red square at position 1,1.\n" .
                "Rendered an unshared square at position 1,1, unique attribute: unique.\n" .
                "Rendered a red square at position 2,2.\n" .
                "Rendered an unshared square at position 2,2, unique attribute: unique.\n" .
                "Rendered a red square at position 3,3.\n" .
                "Rendered an unshared square at position 3,3, unique attribute: unique.\n"
        );
        $client->drawSquares();
    }
}
