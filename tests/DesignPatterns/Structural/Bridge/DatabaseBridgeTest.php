<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Bridge;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Bridge\MySqlDriver;
use GrowthCode\DesignPatterns\Structural\Bridge\SqliteDriver;
use GrowthCode\DesignPatterns\Structural\Bridge\DatabaseBridge;
use GrowthCode\DesignPatterns\Structural\Bridge\SecureDatabaseBridge;

final class DatabaseBridgeTest extends TestCase
{
    public function testCanExecuteMySqlQuery(): void
    {
        $mySqlDriver = new MySqlDriver();
        $databaseBridge = new DatabaseBridge($mySqlDriver);

        $result = $databaseBridge->executeQuery('SELECT * FROM users');

        $this->assertEquals(['MySQL Result 1', 'MySQL Result 2'], $result);
    }

    public function testCanExecuteSqliteQuery(): void
    {
        $sqliteDriver = new SqliteDriver();
        $databaseBridge = new DatabaseBridge($sqliteDriver);

        $result = $databaseBridge->executeQuery('SELECT * FROM users');

        $this->assertEquals(['SQLite Result 1', 'SQLite Result 2'], $result);
    }

    public function testCanExecuteSecureMySqlQuery(): void
    {
        $mySqlDriver = new MySqlDriver();
        $secureDatabaseBridge = new SecureDatabaseBridge($mySqlDriver);

        $result = $secureDatabaseBridge->executeSecureQuery('SELECT * FROM users');

        $this->assertEquals(['MySQL Result 1', 'MySQL Result 2'], $result);
    }
}
