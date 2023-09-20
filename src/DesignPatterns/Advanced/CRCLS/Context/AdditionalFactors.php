<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Context;

class AdditionalFactors
{
    private string $preferredDifficulty;

    private int $maxCost = 0;

    public function __construct(string $preferredDifficulty, int $maxCost)
    {
        $this->preferredDifficulty = $preferredDifficulty;
        $this->maxCost = $maxCost;
    }

    public function getPreferredDifficulty(): string
    {
        return $this->preferredDifficulty;
    }

    public function getMaxCost(): int
    {
        return $this->maxCost;
    }
}
