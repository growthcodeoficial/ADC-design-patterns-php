<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample5;

interface SettingsStrategy
{
    public function createSettings(): Settings;
}
