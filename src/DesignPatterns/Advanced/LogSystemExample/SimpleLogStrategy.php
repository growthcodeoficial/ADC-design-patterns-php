<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Concrete Strategy for simple log formatting.
 */
class SimpleLogStrategy implements LogStrategy
{
    public function format(string $message): string
    {
        return "[Simple] " . $message;
    }
}
