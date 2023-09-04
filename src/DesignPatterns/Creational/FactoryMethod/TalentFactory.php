<?php

namespace GrowthCode\DesignPatterns\Creational\FactoryMethod;

abstract class TalentFactory
{
    abstract public function createArtist(): Artist;

    public function showPerformance(): string
    {
        $artist = $this->createArtist();
        return $artist->perform();
    }
}
