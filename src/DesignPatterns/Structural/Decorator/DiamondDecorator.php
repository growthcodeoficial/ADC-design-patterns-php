<?php

namespace GrowthCode\DesignPatterns\Structural\Decorator;

// ConcreteDecorator1
class DiamondDecorator extends JewelDecorator
{
    public function cost(): float
    {
        return $this->jewel->cost() + 50.0;
    }

    public function description(): string
    {
        return $this->jewel->description() . ' with diamonds';
    }
}
