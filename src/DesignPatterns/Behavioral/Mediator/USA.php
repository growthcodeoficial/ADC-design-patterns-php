<?php

namespace GrowthCode\DesignPatterns\Behavioral\Mediator;

class USA extends Country
{
    public function send(string $message): void
    {
        echo "USA enviando mensagem: $message\n";
        $this->mediator->send($message, $this);
    }

    public function receive(string $message): void
    {
        echo "USA recebeu a mensagem: $message\n";
    }
}
