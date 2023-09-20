<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample4;

class ProductSettingsStrategy implements SettingsStrategy
{
    public function createSettings(): Settings
    {
        return new Settings('create_product');
    }
}
