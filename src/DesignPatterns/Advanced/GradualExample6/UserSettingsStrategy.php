<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample6;

class UserSettingsStrategy implements SettingsStrategy
{
    public function createSettings(): Settings
    {
        return new Settings('create_user');
    }
}
