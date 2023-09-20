<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHome\Commands;

interface Command
{
    public function execute(): void;
    public function undo(): void;
}
