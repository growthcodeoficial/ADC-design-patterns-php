<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHome\Devices;

class LightDevice extends SmartDevice
{
    public function modify(): void
    {
        $this->status = !$this->status;
    }
}
