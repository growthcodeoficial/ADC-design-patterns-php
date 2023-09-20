<?php

namespace GrowthCode\DesignPatterns\Structural\Proxy;

class TreasureProxy implements Treasure
{
    private ?Treasure $realTreasure = null;

    public function open(): string
    {
        if ($this->realTreasure === null) {
            $this->realTreasure = new RealTreasure();
        }
        return "Proxy: " . $this->realTreasure->open();
    }
}
