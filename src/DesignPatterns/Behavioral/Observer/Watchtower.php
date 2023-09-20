<?php

namespace GrowthCode\DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;
use SplObjectStorage;

class Watchtower implements SplSubject
{
    private SplObjectStorage $observers;
    private string $event;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function triggerEvent(string $event): void
    {
        $this->event = $event;
        $this->notify();
    }

    public function getEvent(): string
    {
        return $this->event;
    }
}
