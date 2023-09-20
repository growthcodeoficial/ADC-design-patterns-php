<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Transitions;

use GrowthCode\DesignPatterns\Structural\Workflow\States\Review;
use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;

class ToReview implements TransitionInterface
{
    public function execute(): StateInterface
    {
        // Lógica para transição para o estado "Em Revisão"
        echo "Transição para o estado de Em Revisão.\n";
        return new Review();
    }
}
