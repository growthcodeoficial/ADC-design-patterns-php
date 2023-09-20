<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Observer;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\RecommenderStrategyInterface;

class UserActivityObserver
{
    private RecommenderStrategyInterface $recommender;

    public function __construct(RecommenderStrategyInterface $Recommender)
    {
        $this->recommender = $Recommender;
    }

    public function update(Context $context): void
    {
        $this->recommender->updateRecommendations($context);
    }
}
