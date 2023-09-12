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
        $additionalFactors = new AdditionalFactors('Intermediate', 50);

        $this->context = new Context(new User(1, 'Walmir Silva'), $recentActivities, $additionalFactors);
    }

    /**
     * @return Context
     */
    public function testContextInitialization(): Context
    {
        $this->assertInstanceOf(Context::class, $this->context);
        return $this->context;
    }

    /**
     * @depends testContextInitialization
     * @return RecommenderFactory
     */
    public function testFactoryCreation(): RecommenderFactory
    {
        $factory = new RecommenderFactory();
        $this->assertInstanceOf(RecommenderFactory::class, $factory);
        return $factory;
    }

    /**
     * @depends testFactoryCreation
     * @depends testContextInitialization
     * @return array
     */
    public function testRecommenderStrategies(RecommenderFactory $factory): array
    {
        $contentBasedRecommender = $factory->createRecommender('content');
        $videoBasedRecommender = $factory->createRecommender('video');
        $courseBasedRecommender = $factory->createRecommender('course');

        $this->assertInstanceOf(ContentBasedRecommender::class, $contentBasedRecommender);
        $this->assertInstanceOf(VideoBasedRecommender::class, $videoBasedRecommender);
        $this->assertInstanceOf(CourseBasedRecommender::class, $courseBasedRecommender);

        return [$contentBasedRecommender, $videoBasedRecommender, $courseBasedRecommender];
    }

    /**
     * @depends testRecommenderStrategies
     * @depends testContextInitialization
     * @return HybridRecommender
     */
    public function testHybridRecommender(array $recommenders): HybridRecommender
    {
        $strategies = new Strategies($recommenders);
        $hybridRecommender = new HybridRecommender($strategies->getStrategies());

        // Configurar Decorators e Observer
        $costFiltered = new CostFilterDecorator($hybridRecommender);
        $difficultyFiltered = new DifficultyFilterDecorator($costFiltered);
        $eventManager = EventManager::getInstance();
        $eventManager->addListener('update', function ($context) use ($difficultyFiltered) {
            $difficultyFiltered->updateRecommendations($context);
        });

        // Disparar o evento para preencher as recomendações
        $eventManager->trigger('update', $this->context);

        // Agora, as recomendações devem ser preenchidas
        $recommendations = $hybridRecommender->getRecommendations();
        $this->assertIsArray($recommendations);
        $this->assertNotEmpty($recommendations);

        return $hybridRecommender;
    }


    /**
     * @depends testHybridRecommender
     * @return DifficultyFilterDecorator
     */
    public function testDecorators(HybridRecommender $hybridRecommender): DifficultyFilterDecorator
    {
        $costFiltered = new CostFilterDecorator($hybridRecommender);
        $difficultyFiltered = new DifficultyFilterDecorator($costFiltered);

        $filteredRecommendations = $difficultyFiltered->getRecommendations();
        $this->assertIsArray($filteredRecommendations);

        return $difficultyFiltered;
    }

    /**
     * @depends testDecorators
     * @depends testContextInitialization
     */
    public function testObserver(DifficultyFilterDecorator $difficultyFiltered, Context $context): void
    {
        $eventManager = EventManager::getInstance();
        $userActivityObserver = new UserActivityObserver($difficultyFiltered);
        $eventManager->addListener('userActivity', [$userActivityObserver, 'update']);

        $this->assertTrue($eventManager->hasListener('userActivity'));
    }

    /**
     * @depends testDecorators
     * @return RecommenderMemento
     */
    public function testMemento(DifficultyFilterDecorator $difficultyFiltered): RecommenderMemento
    {
        $memento = new RecommenderMemento($difficultyFiltered->getRecommendations());
        $this->assertEqualsCanonicalizing($memento->getState(), $difficultyFiltered->getRecommendations());

        return $memento;
    }

    /**
     * @depends testHybridRecommender
     * @depends testDecorators
     * @depends testObserver
     * @depends testMemento
     * @depends testContextInitialization
     */
    public function testEndToEnd(HybridRecommender $hybridRecommender, DifficultyFilterDecorator $difficultyFiltered, $observer, RecommenderMemento $memento, Context $context): void
    {
        // Verificar se o HybridRecommender e o DifficultyFilterDecorator têm o mesmo estado inicial
        $this->assertEquals($hybridRecommender->getRecommendations(), $difficultyFiltered->getRecommendations());

        // Verificar se o Memento capturou o estado corretamente
        $this->assertEqualsCanonicalizing($memento->getState(), $difficultyFiltered->getRecommendations());

        // Simular uma atividade do usuário e disparar o observador
        $eventManager = EventManager::getInstance();
        $eventManager->trigger('userActivity', $context);

        // Verificar se o DifficultyFilterDecorator foi atualizado corretamente
        $this->assertNotEquals($memento->getState(), $difficultyFiltered->getRecommendations());

        // Verificar se o estado atual do DifficultyFilterDecorator é consistente com o HybridRecommender
        $this->assertNotEquals($hybridRecommender->getRecommendations(), $difficultyFiltered->getRecommendations());

        // Verificar se o EventManager ainda tem os ouvintes corretos
        $this->assertTrue($eventManager->hasListener('userActivity'));
        $this->assertTrue($eventManager->hasListener('update'));

        // Aqui fica asserções que verificam o estado geral do sistema
        // Verificar se o número de recomendações filtradas é menor ou igual ao número de recomendações híbridas
        $this->assertLessThanOrEqual(count($hybridRecommender->getRecommendations()), count($difficultyFiltered->getRecommendations()));

        // Verificar se todas as recomendações filtradas atendem aos critérios de dificuldade e custo
        foreach ($difficultyFiltered->getRecommendations() as $recommendation) {
            $this->assertEquals('Intermediate', $recommendation['difficulty']);
            $this->assertLessThanOrEqual(50, $recommendation['cost']);
        }

        // Verificar se o estado do Memento não mudou (imutabilidade)
        $newMemento = new RecommenderMemento($difficultyFiltered->getRecommendations());
        $this->assertNotEquals($memento, $newMemento);

        // Verificar se o contexto ainda contém o mesmo usuário (imutabilidade)
        $this->assertEquals($context->getUser()->getId(), 1);

        // Verificar se o EventManager não tem ouvintes adicionais não esperados
        $this->assertTrue($eventManager->hasListener('userActivity'));
        $this->assertTrue($eventManager->hasListener('update'));
    }
}
