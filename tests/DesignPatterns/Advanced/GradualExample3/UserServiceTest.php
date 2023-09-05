<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\GradualExample3;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\GradualExample3\Configuration;
use GrowthCode\DesignPatterns\Advanced\GradualExample3\UserService;
use GrowthCode\DesignPatterns\Advanced\GradualExample3\Settings;

final class UserServiceTest extends TestCase
{
    public function testPerformAction(): void
    {
        $settings = new Settings('create_user');
        $config = Configuration::getInstance($settings);
        $userService = new UserService($config);

        $this->expectOutputString('Performing action based on setting: create_user');
        $userService->performAction();
    }
}
