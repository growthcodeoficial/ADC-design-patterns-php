<?php

namespace GrowthCode\DesignPatterns\Structural\Flyweight;

interface ArtisticDrawing
{
    public function render(string $extrinsicState): string;
}
