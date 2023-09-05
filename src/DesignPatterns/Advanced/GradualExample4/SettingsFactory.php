<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample4;

class SettingsFactory
{
    private static array $strategies;

    public static function init()
    {
        self::$strategies = [
            'user' => new UserSettingsStrategy(),
            'product' => new ProductSettingsStrategy()
        ];
    }

    public static function createSettings(string $type): Settings
    {
        if (!isset(self::$strategies[$type])) {
            throw new \InvalidArgumentException("Invalid type: $type");
        }

        return self::$strategies[$type]->createSettings();
    }
}
