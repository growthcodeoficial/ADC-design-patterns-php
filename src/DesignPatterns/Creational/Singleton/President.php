<?php

namespace GrowthCode\DesignPatterns\Creational\Singleton;

use LogicException;

final class President
{
    private static ?President $instance = null;

    private function __construct()
    {
        // Private constructor to prevent instantiation.
    }

    public static function getInstance(): President
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone(): void
    {
    }

    public function __sleep(): array
    {
        throw new LogicException('Cannot serialize a President.');
        return [];
    }

    public function __wakeup(): void
    {
        throw new LogicException('Cannot unserialize a President.');
    }
}
