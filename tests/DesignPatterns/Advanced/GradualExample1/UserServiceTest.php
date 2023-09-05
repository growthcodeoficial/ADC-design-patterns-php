<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\GradualExample1;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\GradualExample1\Configuration;
use GrowthCode\DesignPatterns\Advanced\GradualExample1\UserService;

final class UserServiceTest extends TestCase
{
    public function testPerformAction(): void
    {
        $config = Configuration::getInstance(['action' => 'create_user']);
        $userService = new UserService($config);

        $this->expectOutputString('Performing action based on setting: create_user');
        $userService->performAction();
    }
}
