<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Strategy Interface for log formatting.
 */
interface LogStrategy
{
    public function format(string $message): string;
}
