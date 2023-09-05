<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample4;

final class Settings
{
    private string $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
