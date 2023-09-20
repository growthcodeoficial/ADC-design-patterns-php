<?php

namespace GrowthCode\DesignPatterns\Structural\Proxy;

class RealTreasure implements Treasure
{
    public function open(): string
    {
        return "You've accessed the real treasure!";
    }
}
