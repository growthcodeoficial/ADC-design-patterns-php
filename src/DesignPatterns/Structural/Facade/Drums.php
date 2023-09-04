<?php

namespace GrowthCode\DesignPatterns\Structural\Facade;

class Drums implements InstrumentInterface
{
    public function play(): string
    {
        return 'Drums beating';
    }
}
