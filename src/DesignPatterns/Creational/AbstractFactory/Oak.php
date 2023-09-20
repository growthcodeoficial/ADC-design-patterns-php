<?php

namespace GrowthCode\DesignPatterns\Creational\AbstractFactory;

class Oak implements Tree
{
    public function height(): string
    {
        return 'Tall!';
    }
}
