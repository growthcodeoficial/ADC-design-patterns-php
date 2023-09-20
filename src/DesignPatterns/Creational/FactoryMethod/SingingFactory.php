<?php

namespace GrowthCode\DesignPatterns\Creational\FactoryMethod;

class SingingFactory extends TalentFactory
{
    public function createArtist(): Artist
    {
        return new Singer();
    }
}
