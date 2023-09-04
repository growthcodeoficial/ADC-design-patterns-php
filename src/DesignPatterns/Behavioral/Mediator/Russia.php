<?php

namespace GrowthCode\DesignPatterns\Behavioral\Mediator;

class Russia extends Country
{
    public function send(string $message): void
    {
        echo "Russia enviando mensagem: $message\n";
        $this->mediator->send($message, $this);
    }

    public function receive(string $message): void
    {
        echo "Russia recebeu a mensagem: $message\n";
    }
}
