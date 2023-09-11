<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\EventManager;

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

    public function trigger($event, $data = null)
    {
        if (isset($this->listeners[$event])) {
            foreach ($this->listeners[$event] as $callback) {
                call_user_func($callback, $data);
            }
        }
    }

    public function hasListener($event)
    {
        return isset($this->listeners[$event]) && count($this->listeners[$event]) > 0;
    }
}
