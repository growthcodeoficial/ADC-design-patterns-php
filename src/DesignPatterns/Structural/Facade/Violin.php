<?php

namespace GrowthCode\DesignPatterns\Structural\Facade;

class Violin implements InstrumentInterface
{
    public function play(): string
    {
        return 'Violin playing';
    }
}
