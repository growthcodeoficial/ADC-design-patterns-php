<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\States;

class Draft implements StateInterface
{
    public function handle(): void
    {
        // Lógica específica para o estado "Rascunho"
        echo "Manipulando o estado de Rascunho.\n";
    }
}
