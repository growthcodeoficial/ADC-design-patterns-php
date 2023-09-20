<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\GradualExample5;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\Configuration;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\SettingsFactory;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\SettingsStrategyRegistry;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\UserSettingsStrategy;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\ProductSettingsStrategy;
use GrowthCode\DesignPatterns\Advanced\GradualExample5\UserService;

final class UserServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Register strategies
        SettingsStrategyRegistry::registerStrategy('user', new UserSettingsStrategy());
        SettingsStrategyRegistry::registerStrategy('product', new ProductSettingsStrategy());
    }

    public function testPerformActionWithUserSettings(): void
    {
        $settings = SettingsFactory::createSettings('user');
        $config = Configuration::getInstance($settings);
        $userService = new UserService($config);

        $this->expectOutputString('Performing action based on setting: create_user');
        $userService->performAction();
    }

    public function testPerformActionWithProductSettings(): void
    {
        $settings = SettingsFactory::createSettings('product');
        $config = Configuration::getInstance($settings);
        $userService = new UserService($config);

        $this->expectOutputString('Performing action based on setting: create_product');
        $userService->performAction();
    }

    protected function tearDown(): void
    {
        Configuration::resetInstance();
        parent::tearDown();
    }
}
