<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

interface RecommenderStrategyInterface
{
    public function updateRecommendations(Context $context): array;

    public function getRecommendations(): array;

}
