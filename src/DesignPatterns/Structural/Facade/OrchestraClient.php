<?php

namespace GrowthCode\DesignPatterns\Structural\Facade;

// Client
class OrchestraClient
{
    private OrchestraFacade $orchestra;

    public function __construct(OrchestraFacade $orchestra)
    {
        $this->orchestra = $orchestra;
    }

    public function orchestratePerformance(): string
    {
        return $this->orchestra->perform();
    }
}
