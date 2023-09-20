<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample6;

interface SettingsStrategy
{
    public function createSettings(): Settings;
}
