<?php

namespace GrowthCode\DesignPatterns\Behavioral\Mediator;

interface Mediator
{
    public function send(string $message, Country $country): void;
}
