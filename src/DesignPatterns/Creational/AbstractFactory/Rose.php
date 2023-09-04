<?php

namespace GrowthCode\DesignPatterns\Creational\AbstractFactory;

class Rose implements Flower
{
    public function smell(): string
    {
        return 'Aromatic!';
    }
}
