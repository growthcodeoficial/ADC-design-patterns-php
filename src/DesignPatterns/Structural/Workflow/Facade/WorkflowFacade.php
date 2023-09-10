<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Facade;

use GrowthCode\DesignPatterns\Structural\Workflow\Context\WorkflowContext;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\TransitionInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\Security\AuthenticatorInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\Proxy\WorkflowProxy;
use GrowthCode\DesignPatterns\Structural\Workflow\Logger\LoggerInterface;

class WorkflowFacade
{
    private WorkflowProxy $proxy;
    private LoggerInterface $logger;

    public function __construct(StateInterface $initialState, AuthenticatorInterface $authenticator, LoggerInterface $logger)
    {
        $context = new WorkflowContext($initialState);
        $this->proxy = new WorkflowProxy($context, $authenticator);
        $this->logger = $logger;
    }

    public function applyTransition(TransitionInterface $transition): void
    {
        $this->logger->log("Applying transition");
        $this->proxy->applyTransition($transition);
        $this->logger->log("Transition applied successfully.");
    }

    public function getCurrentState(): StateInterface
    {
        return $this->proxy->getCurrentState();
    }
}
