<?php

namespace GrowthCode\DesignPatterns\Structural\Decorator;

// ConcreteDecorator2
class GoldDecorator extends JewelDecorator
{
    public function cost(): float
    {
        return $this->jewel->cost() + 30.0;
    }

    public function description(): string
    {
        return $this->jewel->description() . ' with gold';
    }
}
