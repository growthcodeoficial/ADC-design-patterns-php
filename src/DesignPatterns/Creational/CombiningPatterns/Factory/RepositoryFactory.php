<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Factory;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations\DatabaseOperations;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository\RepositoryInterface;

abstract class RepositoryFactory
{
    abstract public function createRepository(DatabaseOperations $databaseOperations): RepositoryInterface;
}
