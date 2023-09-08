<?php

namespace GrowthCode\Tests\DesignPatterns\Creational\CombiningPatterns;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Database\DatabaseConnection;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Operations\DatabaseOperations;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Entity\UserEntity;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Factory\UserRepositoryFactory;
use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository\UserRepository;

class CombiningPatternsTest extends TestCase
{
    public function testCanCreateDatabaseConnection()
    {
        $connection = DatabaseConnection::getInstance('mysql');
        $this->assertInstanceOf(DatabaseConnection::class, $connection);
    }

    public function testCanInsertUserEntity()
    {
        $connection = DatabaseConnection::getInstance('mysql');
        $databaseOperations = new DatabaseOperations($connection);

        $userEntity = new UserEntity(1, 'Walmir Silva');
        $success = $databaseOperations->insert($userEntity, 'users');

        $this->assertTrue($success);
    }

    public function testCanCreateUserRepository()
    {
        $connection = DatabaseConnection::getInstance('mysql');
        $databaseOperations = new DatabaseOperations($connection);
        $repositoryFactory = new UserRepositoryFactory();

        $userRepository = $repositoryFactory->createRepository($databaseOperations);

        $this->assertInstanceOf(UserRepository::class, $userRepository);
    }

    public function testCanAddUserEntityToRepository()
    {
        $connection = DatabaseConnection::getInstance('mysql');
        $databaseOperations = new DatabaseOperations($connection);
        $repositoryFactory = new UserRepositoryFactory();

        $userRepository = $repositoryFactory->createRepository($databaseOperations);

        $userEntity = new UserEntity(1, 'Walmir Silva');
        $success = $userRepository->add($userEntity);

        $this->assertTrue($success);
    }

    public function testCanInsertUserWithOutputCapture()
    {
        // Iniciar o buffer de saída
        ob_start();

        $connection = DatabaseConnection::getInstance('mysql');
        $databaseOperations = new DatabaseOperations($connection);
        $repositoryFactory = new UserRepositoryFactory();

        $userRepository = $repositoryFactory->createRepository($databaseOperations);

        $userEntity = new UserEntity(1, 'Walmir Silva');
        $success = $userRepository->add($userEntity);

        // Obter e limpar o buffer de saída
        $output = ob_get_clean();

        // Verificação do sucesso da operação
        $this->assertTrue($success);

        // Verificação do output (a consulta SQL gerada)
        $expectedSQL = "INSERT INTO users (id, name) VALUES (1, 'Walmir Silva')";
        $this->assertStringContainsString($expectedSQL, $output);
    }
}
