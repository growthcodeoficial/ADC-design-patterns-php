<?php

namespace GrowthCode\DesignPatterns\Structural\Bridge;

// Abstraction
class DatabaseBridge
{
    protected DatabaseDriver $driver;

    public function __construct(DatabaseDriver $driver)
    {
        $this->driver = $driver;
    }

    public function executeQuery(string $sql): array
    {
        return $this->driver->query($sql);
    }
}
