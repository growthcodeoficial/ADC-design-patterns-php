<?php

namespace GrowthCode\DesignPatterns\Structural\Facade;

class Trumpet implements InstrumentInterface
{
    public function play(): string
    {
        return 'Trumpet blowing';
    }
}
