<?php

namespace GrowthCode\DesignPatterns\Creational\FactoryMethod;

class Singer implements Artist
{
    public function perform(): string
    {
        return 'Singing melodiously!';
    }
}
