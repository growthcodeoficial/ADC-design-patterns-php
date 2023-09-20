<?php

namespace GrowthCode\DesignPatterns\Structural\Proxy;

class TreasureHunter
{
    private Treasure $treasure;

    public function __construct(Treasure $treasure)
    {
        $this->treasure = $treasure;
    }

    public function searchTreasure(): string
    {
        return $this->treasure->open();
    }
}
