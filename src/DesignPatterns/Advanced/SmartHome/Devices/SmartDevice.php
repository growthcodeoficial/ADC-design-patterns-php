<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHome\Devices;

abstract class SmartDevice
{
    protected int $status = 0;

    abstract public function modify(): void;

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}
