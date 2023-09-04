<?php

namespace GrowthCode\DesignPatterns\Structural\Flyweight;

class Square implements ArtisticDrawing
{
    private string $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function render(string $extrinsicState): string
    {
        return "Rendered a {$this->color} square at position {$extrinsicState}.";
    }
}
