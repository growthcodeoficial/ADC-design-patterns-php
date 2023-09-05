<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample4;

use ArrayObject;

final class Configuration extends ArrayObject
{
    private static ?Configuration $instance = null;
    private Settings $settings;

    private function __construct(Settings $settings)
    {
        $this->settings = $settings;
        parent::__construct([], ArrayObject::ARRAY_AS_PROPS);
    }

    public static function getInstance(Settings $settings): Configuration
    {
        if (self::$instance === null) {
            self::$instance = new self($settings);
        }

        return self::$instance;
    }

    public function getSettings(): Settings
    {
        return $this->settings;
    }
}
