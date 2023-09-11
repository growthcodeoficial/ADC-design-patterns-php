<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\CRCLS;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\CRCLS\User\User;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\RecentActivities;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\AdditionalFactors;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\ContentBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\VideoBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\CourseBasedRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Factory\RecommenderFactory;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Hybrid\HybridRecommender;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Hybrid\Strategies;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Decorator\CostFilterDecorator;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Decorator\DifficultyFilterDecorator;
use GrowthCode\DesignPatterns\Advanced\CRCLS\EventManager\EventManager;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Memento\RecommenderMemento;
use GrowthCode\DesignPatterns\Advanced\CRCLS\Observer\UserActivityObserver;

class CRCLSTest extends TestCase
{
    private Context $context;

    protected function setUp(): void
    {
        // Inicialize RecentActivities com atividades que você espera que o usuário tenha realizado recentemente.
        $recentActivities = new RecentActivities([
            'recentCourses' => ['Curso básico de Python', 'Curso de JavaScript para iniciantes'],
            'recentVideos' => ['Como usar o terminal Linux', 'Introdução ao SQL'],
            'recentArticles' => ['Introdução ao Git', 'Princípios SOLID em OOP']
        ]);

        // Inicialize AdditionalFactors com outros fatores que podem ser relevantes para as recomendações.
        $additionalFactors = new AdditionalFactors([
            'preferredDifficulty' => 'Intermediate',
            'maxCost' => 50
        ]);

        $this->context = new Context(new User(1, 'Walmir Silva'), $recentActivities, $additionalFactors);
    }

    public function testEndToEnd(): void
    {
        // Test Factory and Recommender Strategies
        $factory = new RecommenderFactory();
        $contentBasedRecommender = $factory->createRecommender('content');
        $videoBasedRecommender = $factory->createRecommender('video');
        $courseBasedRecommender = $factory->createRecommender('course');

        // Test Hybrid Recommender
        $strategies = new Strategies([$contentBasedRecommender, $videoBasedRecommender, $courseBasedRecommender]);
        $hybridRecommender = new HybridRecommender($strategies->getStrategies());

        // Test Decorators
        $costFiltered = new CostFilterDecorator($hybridRecommender);
        $difficultyFiltered = new DifficultyFilterDecorator($costFiltered);

        // Test Observer
        $eventManager = EventManager::getInstance();
        $eventManager->addListener('update', function ($context) use ($difficultyFiltered) {
            $difficultyFiltered->updateRecommendations($context);
        });

        $userActivityObserver = new UserActivityObserver($difficultyFiltered);
        $eventManager->addListener('userActivity', [$userActivityObserver, 'update']);


        // Trigger update
        $eventManager->trigger('update', $this->context);
        $eventManager->trigger('userActivity', $this->context);

        // Test Memento
        $memento = new RecommenderMemento($difficultyFiltered->getRecommendations());

        // Assertions
        // Verificar se as estratégias de recomendação foram criadas corretamente
        $this->assertInstanceOf(ContentBasedRecommender::class, $contentBasedRecommender);
        $this->assertInstanceOf(VideoBasedRecommender::class, $videoBasedRecommender);
        $this->assertInstanceOf(CourseBasedRecommender::class, $courseBasedRecommender);

        // Verificar se o HybridRecommender está funcionando como esperado
        $recommendations = $hybridRecommender->getRecommendations();
        $this->assertIsArray($recommendations);
        $this->assertNotEmpty($recommendations);

        // Verificar se os Decorators estão funcionando como esperado
        $filteredRecommendations = $difficultyFiltered->getRecommendations();
        $this->assertIsArray($filteredRecommendations);

        // Verificar se os Decorators estão funcionando como esperado
        $costFilteredRecommendations = $costFiltered->getRecommendations();
        $this->assertIsArray($costFilteredRecommendations);
        foreach ($costFilteredRecommendations as $recommendation) {
            $this->assertLessThanOrEqual(50, $recommendation['cost']);
        }

        // Testar DifficultyFilterDecorator
        $difficultyFilteredRecommendations = $difficultyFiltered->getRecommendations();
        $this->assertIsArray($difficultyFilteredRecommendations);

        foreach ($difficultyFilteredRecommendations as $recommendation) {
            $this->assertEquals('Intermediate', $recommendation['difficulty']);  // Esta linha deve passar se o decorador estiver funcionando corretamente
        }

        // Testar se os decoradores estão encadeados corretamente
        foreach ($difficultyFilteredRecommendations as $recommendation) {
            $this->assertLessThanOrEqual(50, $recommendation['cost']);
        }

        // Verificar se o UserActivityObserver está funcionando corretamente
        $this->assertTrue($eventManager->hasListener('userActivity'));

        // Verificar se o Memento capturou o estado corretamente
        $this->assertEquals($memento->getState(), $difficultyFiltered->getRecommendations());

        // Verificar se o EventManager está funcionando corretamente
        $this->assertTrue($eventManager->hasListener('update'));

        // Verificar se o Factory está funcionando como esperado
        $this->assertInstanceOf(RecommenderFactory::class, $factory);

        // Verificar se o Context está funcionando como esperado
        $this->assertInstanceOf(Context::class, $this->context);
    }
}
