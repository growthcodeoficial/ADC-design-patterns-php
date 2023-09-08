<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\CRCLS;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\CRCLS\RecommenderFactory;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\RecentActivities;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\AdditionalFactors;
use GrowthCode\DesignPatterns\Advanced\CRCLS\User\User;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\ContentBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\VideoBasedRecommender;

final class CRCLSTest extends TestCase
{
    public function testCanCreateContentBasedRecommender(): void
    {
        $factory = new RecommenderFactory();
        $recommender = $factory->createRecommender('content');
        $this->assertInstanceOf(ContentBasedRecommender::class, $recommender);
    }

    public function testCanCreateVideoBasedRecommender(): void
    {
        $factory = new RecommenderFactory();
        $recommender = $factory->createRecommender('video');
        $this->assertInstanceOf(VideoBasedRecommender::class, $recommender);
    }

    public function testCanUpdateRecommendationsBasedOnUserActivity(): void
    {
        $user = new User(1, 'John Doe');
        $recentActivities = new RecentActivities(['activity1', 'activity2']);
        $additionalFactors = new AdditionalFactors(['factor1' => 'value1']);

        $context = new Context($user, $recentActivities, $additionalFactors);

        $recommender = new ContentBasedRecommender();
        $recommendations = $recommender->updateRecommendations($context);

        $this->assertNotEmpty($recommendations);
        $this->assertIsArray($recommendations);
    }

    public function testCanUndoLastRecommendation(): void
    {
        // Logic to test the undo functionality
        // For this example, let's assume that the RecommenderMemento class is used to save the state
        $user = new User(1, 'John Doe');
        $recentActivities = new RecentActivities(['activity1', 'activity2']);
        $additionalFactors = new AdditionalFactors(['factor1' => 'value1']);

        $context = new Context($user, $recentActivities, $additionalFactors);

        $recommender = new ContentBasedRecommender();
        $recommendations = $recommender->updateRecommendations($context);

        // Save the state
        $memento = $recommender->save();

        // Modify the recommendations
        $newRecommendations = $recommender->updateRecommendations($context);

        // Undo the modifications
        $recommender->restore($memento);

        $this->assertEquals($recommendations, $recommender->getRecommendations());
    }


    public function testCanApplyCostFilter(): void
    {
        $user = new User(1, 'John Doe');
        $recentActivities = new RecentActivities(['activity1', 'activity2']);
        $additionalFactors = new AdditionalFactors(['factor1' => 'value1']);

        $context = new Context($user, $recentActivities, $additionalFactors);

        $recommender = new ContentBasedRecommender();
        $recommender = new CostFilterDecorator($recommender); // Decorate with cost filter

        $recommendations = $recommender->updateRecommendations($context);

        // Assuming that the cost filter removes any paid content
        foreach ($recommendations as $recommendation) {
            $this->assertEquals('free', $recommendation['cost']);
        }
    }

    public function testCanApplyDifficultyFilter(): void
    {
        $user = new User(1, 'John Doe');
        $recentActivities = new RecentActivities(['activity1', 'activity2']);
        $additionalFactors = new AdditionalFactors(['factor1' => 'value1']);

        $context = new Context($user, $recentActivities, $additionalFactors);

        $recommender = new ContentBasedRecommender();
        $recommender = new DifficultyFilterDecorator($recommender); // Decorate with difficulty filter

        $recommendations = $recommender->updateRecommendations($context);

        // Assuming that the difficulty filter removes any 'advanced' content
        foreach ($recommendations as $recommendation) {
            $this->assertNotEquals('advanced', $recommendation['difficulty']);
        }
    }
}
