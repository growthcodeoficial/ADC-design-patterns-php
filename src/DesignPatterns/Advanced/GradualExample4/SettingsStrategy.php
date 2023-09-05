<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample4;

interface SettingsStrategy
{
    public function createSettings(): Settings;
}
