<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\States;

class Review implements StateInterface
{
    public function handle(): void
    {
        // Lógica específica para o estado "Revisão"
        echo "Manipulando o estado de Revisão.\n";
    }
}
