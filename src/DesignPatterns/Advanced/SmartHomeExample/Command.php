<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

interface Command
{
    public function execute(): void;
    public function undo(): void;
}
