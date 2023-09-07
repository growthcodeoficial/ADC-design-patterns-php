<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

class VacationModeListener implements EventListener, Command
{
    private SmartDevice $device;
    private EventManager $eventManager;

    public function __construct(SmartDevice $device)
    {
        $this->device = $device;
        $this->eventManager = EventManager::getInstance();
    }

    public function handle(Event $event): void
    {
        $this->eventManager->pushState(new ObjectState(clone $this->device));
        $this->execute();
    }

    public function execute(): void
    {
        $this->device->modify();
    }

    public function undo(): void
    {
        $state = $this->eventManager->popState();
        if ($state !== null) {
            $restoredDevice = $state->getState();
            $this->device->setStatus($restoredDevice->getStatus());
        }
    }
}
