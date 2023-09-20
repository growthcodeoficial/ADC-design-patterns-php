<?php

namespace GrowthCode\DesignPatterns\Creational\FactoryMethod;

class DanceFactory extends TalentFactory
{
    public function createArtist(): Artist
    {
        return new Dancer();
    }
}
