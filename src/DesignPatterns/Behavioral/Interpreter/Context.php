<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

use ArrayObject;

// Context
class Context extends ArrayObject
{
    public function set(string $key, string $value): void
    {
        $this[$key] = $value;
    }

    public function get(string $key): ?string
    {
        return $this[$key] ?? null;
    }
}
