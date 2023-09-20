<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample3;

class UserSettingsStrategy implements SettingsStrategy
{
    public function createSettings(): Settings
    {
        return new Settings('create_user');
    }
}
