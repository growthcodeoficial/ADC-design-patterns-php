<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\States;

class Published implements StateInterface
{
    public function handle(): void
    {
        // Lógica específica para o estado "Publicado"
        echo "Manipulando o estado de Publicado.\n";
    }
}
