<?php

namespace GrowthCode\DesignPatterns\Structural\Bridge;

// Abstraction
interface DatabaseDriver
{
    public function query(string $sql): array;
}
