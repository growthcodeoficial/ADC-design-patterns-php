<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Concrete Product Part
class SeaSalt implements Salt
{
    public function getType(): string
    {
        return 'Sea Salt';
    }
}
