<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\EventManager;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

final class EventManager
{
    private static ?EventManager $instance = null;
    private array $listeners = [];

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function addListener(string $eventType, callable $listener): void
    {
        $this->listeners[$eventType][] = $listener;
    }

    public function trigger(string $event, Context $context): void
    {
        if (isset($this->listeners[$event])) {
            foreach ($this->listeners[$event] as $callback) {
                call_user_func($callback, $context);
            }
        }
    }

    public function hasListener(string $event): bool
    {
        return isset($this->listeners[$event]) && count($this->listeners[$event]) > 0;
    }
}
