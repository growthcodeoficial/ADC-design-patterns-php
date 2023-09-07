<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

interface EventListener
{
    public function handle(Event $event): void;
}
