<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Client class for the logging system.
 */
class LoggingSystem
{
    private Logger $logger;
    private array $observers = [];

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function addObserver(LogObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function logMessage(string $message): void
    {
        $this->logger->log($message);
        foreach ($this->observers as $observer) {
            $observer->notify($message);
        }
    }
}
