<?php

namespace GrowthCode\DesignPatterns\Structural\Decorator;

// Decorator
abstract class JewelDecorator implements Jewel
{
    protected Jewel $jewel;

    public function __construct(Jewel $jewel)
    {
        $this->jewel = $jewel;
    }
}
