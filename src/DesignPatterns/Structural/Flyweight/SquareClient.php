<?php

namespace GrowthCode\DesignPatterns\Structural\Flyweight;

class SquareClient
{
    private SquareFactory $factory;

    public function __construct(SquareFactory $factory)
    {
        $this->factory = $factory;
    }

    public function drawSquares(): void
    {
        $positions = ["1,1", "2,2", "3,3"];

        foreach ($positions as $position) {
            $square = $this->factory->getSquare("red");
            echo $square->render($position) . "\n";

            $unsharedSquare = new UnsharedSquare("unique");
            echo $unsharedSquare->render($position) . "\n";
        }
    }
}
