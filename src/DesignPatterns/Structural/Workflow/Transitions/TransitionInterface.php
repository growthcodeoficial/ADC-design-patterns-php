<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Transitions;

use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;

interface TransitionInterface
{
    public function execute(): StateInterface;
}
