<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Proxy;

use GrowthCode\DesignPatterns\Structural\Workflow\Context\WorkflowContext;
use GrowthCode\DesignPatterns\Structural\Workflow\Context\WorkflowContextInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\TransitionInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\Security\AuthenticatorInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;

class WorkflowProxy
{
    private WorkflowContextInterface $context;
    private AuthenticatorInterface $authenticator;

    public function __construct(WorkflowContextInterface $context, AuthenticatorInterface $authenticator)
    {
        $this->context = $context;
        $this->authenticator = $authenticator;
    }

    public function applyTransition(TransitionInterface $transition): void
    {
        if (!$this->authenticator->authenticate(true)) {
            throw new \Exception("Falha na autenticação");
        }

        $this->context->applyTransition($transition);
    }

    public function getCurrentState(): StateInterface
    {
        return $this->context->getState();
    }
}
