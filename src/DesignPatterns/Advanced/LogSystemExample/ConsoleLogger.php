<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Concrete Logger for console output.
 */
class ConsoleLogger extends Logger
{
    protected function writeLog(string $message): void
    {
        echo "Writing to console: $message\n";
    }
}
