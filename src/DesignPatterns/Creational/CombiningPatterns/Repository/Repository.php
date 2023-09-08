<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Entity\EntityInterface;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations\DatabaseOperations;

abstract class Repository implements RepositoryInterface
{
    protected DatabaseOperations $databaseOperations;
    private string $tableName;

    public function __construct(DatabaseOperations $databaseOperations, string $tableName)
    {
        $this->databaseOperations = $databaseOperations;
        $this->tableName = $tableName;
    }

    public function add(EntityInterface $entity): bool
    {
        return $this->databaseOperations->insert($entity, $this->tableName);
    }
}
