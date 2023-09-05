<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample6;

use ArrayObject;

final class Configuration extends ArrayObject
{
    private static array $instances = [];
    private Settings $settings;

    private function __construct(Settings $settings)
    {
        $this->settings = $settings;
        parent::__construct([], ArrayObject::ARRAY_AS_PROPS);
    }

    public static function getInstance(Settings $settings, string $key): Configuration
    {
        if (!isset(self::$instances[$key])) {
            self::$instances[$key] = new self($settings);
        }

        return self::$instances[$key];
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }
}
