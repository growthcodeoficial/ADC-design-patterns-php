<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

use SplStack;

final class EventManager
{
    private static ?EventManager $instance = null;
    private array $listeners = [];
    private SplStack $stack;

    private function __construct()
    {
        $this->stack = new SplStack();
    }

    public static function getInstance(): self
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function addListener(string $eventType, EventListener $listener): void
    {
        $this->listeners[$eventType][] = $listener;
    }

    public function trigger(Event $event): void
    {
        foreach ($this->listeners[$event->getType()] ?? [] as $listener) {
            $listener->handle($event);
        }
    }

    public function pushState(ObjectState $state): void
    {
        $this->stack->push($state);
    }

    public function popState(): ?ObjectState
    {
        return $this->stack->isEmpty() ? null : $this->stack->pop();
    }

    public function reset(): void
    {
        $this->listeners = [];
        $this->stack = new SplStack();
    }
}
