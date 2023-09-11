<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHome\Events;

class Event
{
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
