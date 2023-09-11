<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Hybrid;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\RecommenderStrategyInterface;

class HybridRecommender implements RecommenderStrategyInterface
{
    private array $strategies;
    private array $finalRecommendations = [];

    public function __construct(array $strategies)
    {
        $this->strategies = $strategies;
    }

    public function updateRecommendations(Context $context): array
    {
        $this->finalRecommendations = [];

        foreach ($this->strategies as $strategy) {
            $recommendations = $strategy->updateRecommendations($context);
            $this->finalRecommendations = array_merge($this->finalRecommendations, $recommendations);
        }

        // Aqui você pode adicionar lógica para eliminar duplicatas, classificar, etc.
        return $this->finalRecommendations;
    }

    public function getRecommendations(): array
    {
        return $this->finalRecommendations;
    }
}
