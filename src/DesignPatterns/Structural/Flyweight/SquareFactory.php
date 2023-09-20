<?php

namespace GrowthCode\DesignPatterns\Structural\Flyweight;

class SquareFactory
{
    private array $squares = [];

    public function getSquare(string $color): ArtisticDrawing
    {
        if (!isset($this->squares[$color])) {
            $this->squares[$color] = new Square($color);
        }
        return $this->squares[$color];
    }
}
