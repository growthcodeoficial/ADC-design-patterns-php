<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHome\Listeners;

use GrowthCode\DesignPatterns\Advanced\SmartHome\Events\Event;

interface EventListener
{
    public function handle(Event $event): void;
}
