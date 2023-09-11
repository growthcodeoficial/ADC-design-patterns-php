<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Hybrid;

final class Strategies
{
    private array $strategies;

    public function __construct(array $strategies)
    {
        $this->strategies = $strategies;
    }

    public function getStrategies(): array
    {
        return $this->strategies;
    }
}
