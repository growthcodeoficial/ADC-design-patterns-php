<?php

namespace GrowthCode\DesignPatterns\Advanced\SmartHomeExample;

class LightDevice extends SmartDevice
{
    public function modify(): void
    {
        $this->status = !$this->status;
    }
}
