<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Context;

class AdditionalFactors
{
    private array $factors = [
        'preferredDifficulty' => '',
        'maxCost' => 0
    ];

    public function __construct(array $factors)
    {
        $this->factors = $factors;
    }

    public function getPreferredDifficulty(): string
    {
        return $this->factors['preferredDifficulty'];
    }

    public function getMaxCost(): int
    {
        return $this->factors['maxCost'];
    }
}
