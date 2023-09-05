<?php

namespace GrowthCode\DesignPatterns\Advanced\GradualExample3;

class UserService
{
    private Configuration $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    public function performAction(): void
    {
        $setting = $this->config->getSettings()->getAction();
        echo "Performing action based on setting: $setting";
    }
}
