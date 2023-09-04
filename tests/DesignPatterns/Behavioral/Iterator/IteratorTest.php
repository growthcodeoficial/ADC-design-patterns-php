<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Iterator;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Iterator\Ruin;
use GrowthCode\DesignPatterns\Behavioral\Iterator\Archaeologist;
use GrowthCode\DesignPatterns\Behavioral\Iterator\RoomCollection;

final class IteratorTest extends TestCase
{
    public function testIterator(): void
    {
        // Setup: Criando um conjunto de salas para explorar.
        $ruin = new Ruin(RoomCollection::createWithDefaultRooms());

        $iterator = $ruin->getIterator();

        // Começamos do começo, então a posição deve ser zero
        $this->assertEquals(0, $iterator->key());

        // Testa o primeiro elemento
        $this->assertEquals("Sala 1", $iterator->current());

        // Vamos para o próximo elemento
        $iterator->next();
        $this->assertEquals(1, $iterator->key());
        $this->assertEquals("Sala 2", $iterator->current());

        // Vamos para o último elemento
        $iterator->next();
        $this->assertEquals(2, $iterator->key());
        $this->assertEquals("Sala do Tesouro", $iterator->current());

        // Vamos tentar ir além do último elemento, o que não deve ser possível
        $iterator->next();
        $this->assertFalse($iterator->valid());

        // Vamos rebobinar e testar o primeiro elemento novamente
        $iterator->rewind();
        $this->assertEquals(0, $iterator->key());
        $this->assertEquals("Sala 1", $iterator->current());
    }

    public function testIteratorAndExploration(): void
    {
        // Configuração: Criando um conjunto de salas para explorar.
        $ruin = new Ruin(RoomCollection::createWithDefaultRooms());
        $archaeologist = new Archaeologist($ruin);

        // Espera que a saída seja a seguinte ao explorar as salas
        $this->expectOutputString("Explorando as ruínas...\nEntrando na sala: Sala 1\nEntrando na sala: Sala 2\nEntrando na sala: Sala do Tesouro\n");

        // Executar a exploração e verificar a saída
        $archaeologist->explore();
    }
}
