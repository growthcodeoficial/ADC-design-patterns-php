<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\GradualExample4;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\GradualExample4\Configuration;
use GrowthCode\DesignPatterns\Advanced\GradualExample4\SettingsFactory;
use GrowthCode\DesignPatterns\Advanced\GradualExample4\UserService;

final class UserServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        SettingsFactory::init();
    }

    public function testPerformAction(): void
    {
        $settings = SettingsFactory::createSettings('user');
        $config = Configuration::getInstance($settings);
        $userService = new UserService($config);

        $this->expectOutputString('Performing action based on setting: create_user');
        $userService->performAction();
    }
}
