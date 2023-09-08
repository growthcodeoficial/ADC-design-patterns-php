<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Database\DatabaseConnection;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Entity\EntityInterface;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\EntityHelper\SqlQueryBuilder;

class DatabaseOperations
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function insert(EntityInterface $entity, string $tableName): bool
    {
        $attributes = $entity->getAttributes();
        $query = SqlQueryBuilder::buildInsertQuery($tableName, $attributes);

        // Agora usando o método executeQuery da DatabaseConnection
        $success = $this->connection->executeQuery($query);

        if (!$success) {
            throw new \Exception("Falha ao inserir no banco de dados");
        }
        return $success;
    }
}
