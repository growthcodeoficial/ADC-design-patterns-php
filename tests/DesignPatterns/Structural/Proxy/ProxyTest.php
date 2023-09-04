<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Proxy;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Proxy\TreasureProxy;
use GrowthCode\DesignPatterns\Structural\Proxy\TreasureHunter;

final class ProxyTest extends TestCase
{
    public function testProxy(): void
    {
        $proxy = new TreasureProxy();
        $this->assertEquals("Proxy: You've accessed the real treasure!", $proxy->open());

        // Teste com o TreasureHunter usando TreasureProxy
        $treasureHunterProxy = new TreasureHunter($proxy);
        $this->assertEquals("Proxy: You've accessed the real treasure!", $treasureHunterProxy->searchTreasure());
    }
}
