<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Factory;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository\RepositoryInterface;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository\UserRepository;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations\DatabaseOperations;

class UserRepositoryFactory extends RepositoryFactory
{
    public function createRepository(DatabaseOperations $databaseOperations): RepositoryInterface
    {
        return new UserRepository($databaseOperations);
    }
}
