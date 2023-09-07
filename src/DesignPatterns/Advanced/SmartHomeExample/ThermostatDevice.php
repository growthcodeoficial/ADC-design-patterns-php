<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

class ThermostatDevice extends SmartDevice
{
    public function modify(): void
    {
        $this->status += 2;
    }
}
