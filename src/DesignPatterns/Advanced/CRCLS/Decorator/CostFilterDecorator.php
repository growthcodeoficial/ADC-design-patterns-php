<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Decorator;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\RecommenderStrategyInterface;

class CostFilterDecorator implements RecommenderStrategyInterface
{
    private RecommenderStrategyInterface $recommender;
    private array $recommendations = [];

    public function __construct(RecommenderStrategyInterface $recommender)
    {
        $this->recommender = $recommender;
        $this->recommendations = $recommender->getRecommendations();
    }

    public function updateRecommendations(Context $context): array
    {
        $recommendations = $this->recommender->updateRecommendations($context);

        // Obter o custo máximo permitido do contexto
        $maxCost = $context->getAdditionalFactors()->getMaxCost();

        $this->recommendations = array_filter($recommendations, function ($item) use ($maxCost) {
            return $item['cost'] <= $maxCost; // Filtrar por custo máximo permitido
        });

        return $this->recommendations;
    }


    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
