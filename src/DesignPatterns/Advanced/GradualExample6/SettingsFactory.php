<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample6;

class SettingsFactory
{
    public static function createSettings(string $type): Settings
    {
        $strategy = SettingsStrategyRegistry::getStrategy($type);
        return $strategy->createSettings();
    }
}
