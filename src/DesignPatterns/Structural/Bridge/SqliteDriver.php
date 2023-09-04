<?php

namespace GrowthCode\DesignPatterns\Structural\Bridge;

// ConcreteImplementation B
class SqliteDriver implements DatabaseDriver
{
    public function query(string $sql): array
    {
        // Simulação da execução de uma query no SQLite
        return ["SQLite Result 1", "SQLite Result 2"];
    }
}
