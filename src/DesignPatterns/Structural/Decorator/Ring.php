<?php

namespace GrowthCode\DesignPatterns\Structural\Decorator;

// ConcreteComponent
class Ring implements Jewel
{
    public function cost(): float
    {
        return 100.0;
    }

    public function description(): string
    {
        return 'An elegant ring';
    }
}
