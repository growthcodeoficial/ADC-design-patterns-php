<?php

namespace Tests\GrowthCode\DesignPatterns\Structural\Workflow;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Draft;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Review;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\ToReview;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\ToPublished;
use GrowthCode\DesignPatterns\Structural\Workflow\Security\SimpleAuthenticator;
use GrowthCode\DesignPatterns\Structural\Workflow\Facade\WorkflowFacade;
use GrowthCode\DesignPatterns\Structural\Workflow\Logger\SimpleLogger;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Published;

final class WorkflowTest extends TestCase
{
    public function testSuccessfulTransition(): void
    {
        // Inicialização
        $initialState = new Draft();
        $authenticator = new SimpleAuthenticator();
        $logger = new SimpleLogger();
        $facade = new WorkflowFacade($initialState, $authenticator, $logger);

        $facade->applyTransition(new ToReview());
        $this->assertInstanceOf(Review::class, $facade->getCurrentState());

        $facade->applyTransition(new ToPublished());
        $this->assertInstanceOf(Published::class, $facade->getCurrentState());
    }

    public function testSuccessfulTransitionWithLogDetection(): void
    {
        // Inicialização
        $initialState = new Draft();
        $authenticator = new SimpleAuthenticator();
        $logger = new SimpleLogger();
        $facade = new WorkflowFacade($initialState, $authenticator, $logger);

        // Iniciar captura de saída
        ob_start();

        $facade->applyTransition(new ToReview());
        // Obter e limpar a saída capturada
        $output = ob_get_clean();

        $this->assertInstanceOf(Review::class, $facade->getCurrentState());
        $this->assertStringContainsString('Applying transition', $output);
        $this->assertStringContainsString('Transition applied successfully', $output);
    }

    public function testExceptionWhenTransitioningFromDraftToPublished(): void
    {
        // Inicialização
        $initialState = new Draft();
        $authenticator = new SimpleAuthenticator();
        $logger = new SimpleLogger();
        $facade = new WorkflowFacade($initialState, $authenticator, $logger);

        // Teste de autenticação bem-sucedida
        $this->assertTrue($authenticator->authenticate(true));

        // Teste de exceção ao tentar ir de Draft para Published
        $this->expectExceptionMessage("Invalid transition");

        $toPublished = new ToPublished();
        $facade->applyTransition($toPublished);
    }
}
