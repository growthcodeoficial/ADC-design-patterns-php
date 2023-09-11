<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Factory;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\RecommenderStrategyInterface;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\ContentBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\VideoBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\CourseBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\IgnorerStrategyInterface;

class RecommenderFactory
{
    private $strategies = [];

    public function __construct()
    {
        $this->strategies['content'] = new ContentBasedRecommender();
        $this->strategies['video'] = new VideoBasedRecommender();
        $this->strategies['course'] = new CourseBasedRecommender();
    }

    public function createRecommender(string $type): RecommenderStrategyInterface | IgnorerStrategyInterface
    {
        if (!isset($this->strategies[$type])) {
            throw new \InvalidArgumentException("Invalid recommender type: $type");
        }

        return $this->strategies[$type];
    }
}
