<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Context;

use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Draft;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Review;
use GrowthCode\DesignPatterns\Structural\Workflow\States\Published;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\TransitionInterface;

class WorkflowContext implements WorkflowContextInterface
{
    private StateInterface $currentState;
    private array $validTransitions = [
        Draft::class => [Review::class],
        Review::class => [Published::class, Draft::class],
        Published::class => [Review::class]
    ];

    public function __construct(StateInterface $initialState)
    {
        $this->currentState = $initialState;
    }

    public function getState(): StateInterface
    {
        return $this->currentState;
    }

    private function isValidTransition(StateInterface $nextState): bool
    {
        $currentStateClass = get_class($this->currentState);
        $nextStateClass = get_class($nextState);

        // Verifique se o próximo estado é um estado válido a partir do estado atual
        return in_array($nextStateClass, $this->validTransitions[$currentStateClass], true);
    }

    public function applyTransition(TransitionInterface $transition): void
    {
        $nextState = $transition->execute();

        if (!$this->isValidTransition($nextState)) {
            throw new \Exception('Invalid transition');
        }

        $this->currentState = $nextState;
        $this->currentState->handle();
    }
}
