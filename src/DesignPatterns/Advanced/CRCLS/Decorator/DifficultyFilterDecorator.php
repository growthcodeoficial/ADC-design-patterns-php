<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Decorator;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\RecommenderStrategyInterface;

class DifficultyFilterDecorator implements RecommenderStrategyInterface
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

        // Obter a dificuldade preferida do contexto
        $preferredDifficulty = $context->getAdditionalFactors()->getPreferredDifficulty();

        $this->recommendations = array_filter($recommendations, function ($item) use ($preferredDifficulty) {
            return $item['difficulty'] === $preferredDifficulty; // Filtrar por dificuldade preferida
        });

        return $this->recommendations;
    }


    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
