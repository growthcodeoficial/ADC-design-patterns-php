<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Observer Interface for log notifications.
 */
interface LogObserver
{
    public function notify(string $message): void;
}
