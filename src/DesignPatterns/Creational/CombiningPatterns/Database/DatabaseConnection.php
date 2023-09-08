<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Database;

final class DatabaseConnection
{
    private static array $instances = [];

    private function __construct()
    {
    }

    public static function getInstance(string $type = 'mysql'): DatabaseConnection
    {
        if (!isset(self::$instances[$type])) {
            self::$instances[$type] = new DatabaseConnection();
        }
        return self::$instances[$type];
    }

    public function executeQuery(string $query): bool
    {
        // Simula a execução de uma consulta SQL e retorna verdadeiro se for bem-sucedida.
        echo $query;
        return true;
    }
}
