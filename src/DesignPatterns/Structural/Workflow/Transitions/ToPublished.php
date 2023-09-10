<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Transitions;

use GrowthCode\DesignPatterns\Structural\Workflow\States\Published;
use GrowthCode\DesignPatterns\Structural\Workflow\States\StateInterface;

class ToPublished implements TransitionInterface
{
    public function execute(): StateInterface
    {
        // Lógica para transição para o estado "Publicado"
        echo "Transição para o estado de Publicado.\n";
        return new Published();
    }
}
