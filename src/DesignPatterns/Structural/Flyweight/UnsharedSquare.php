<?php

namespace GrowthCode\DesignPatterns\Structural\Flyweight;

class UnsharedSquare implements ArtisticDrawing
{
    private string $uniqueAttribute;

    public function __construct(string $uniqueAttribute)
    {
        $this->uniqueAttribute = $uniqueAttribute;
    }

    public function render(string $extrinsicState): string
    {
        return "Rendered an unshared square at position {$extrinsicState}, unique attribute: {$this->uniqueAttribute}.";
    }
}
