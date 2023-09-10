<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Context;

use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;
use GrowthCode\DesignPatterns\Structural\Workflow\Transitions\TransitionInterface;

interface WorkflowContextInterface
{
    public function applyTransition(TransitionInterface $transition): void;
    public function getState(): StateInterface;
}
