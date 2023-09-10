<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Logger;

interface LoggerInterface
{
    public function log(string $message): void;
}
