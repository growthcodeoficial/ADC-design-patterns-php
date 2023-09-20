<?php

namespace GrowthCode\DesignPatterns\Creational\FactoryMethod;

class Dancer implements Artist
{
    public function perform(): string
    {
        return 'Dancing gracefully!';
    }
}
