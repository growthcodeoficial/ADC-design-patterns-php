<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Concrete Product Part
class ActiveYeast implements Yeast
{
    public function getType(): string
    {
        return 'Active Yeast';
    }
}
