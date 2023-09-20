<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Logger;

class SimpleLogger implements LoggerInterface
{
    public function log(string $message): void
    {
        echo $message . "\n";
    }
}
