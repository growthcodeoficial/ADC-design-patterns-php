<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations\DatabaseOperations;

class UserRepository extends Repository
{
    public function __construct(DatabaseOperations $databaseOperations)
    {
        parent::__construct($databaseOperations, 'users');
    }
}
