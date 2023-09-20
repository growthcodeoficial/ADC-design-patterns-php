<?php

namespace GrowthCode\DesignPatterns\Structural\Decorator;

// Component
interface Jewel
{
    public function cost(): float;
    public function description(): string;
}
