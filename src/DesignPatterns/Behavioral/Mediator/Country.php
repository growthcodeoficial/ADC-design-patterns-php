<?php

namespace GrowthCode\DesignPatterns\Behavioral\Mediator;

abstract class Country
{
    protected Mediator $mediator;

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public abstract function send(string $message): void;
    public abstract function receive(string $message): void;
}
