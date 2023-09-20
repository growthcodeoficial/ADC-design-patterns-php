<?php

namespace GrowthCode\DesignPatterns\Structural\Bridge;

// ConcreteImplementation A
class MySqlDriver implements DatabaseDriver
{
    public function query(string $sql): array
    {
        // Simulação da execução de uma query no MySQL
        return ["MySQL Result 1", "MySQL Result 2"];
    }
}
