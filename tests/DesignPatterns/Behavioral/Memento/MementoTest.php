<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Memento;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Memento\Person;
use GrowthCode\DesignPatterns\Behavioral\Memento\MemoryLibrary;

final class MementoTest extends TestCase
{
    public function testMementoPattern()
    {
        // Passo 1: Inicializar uma nova Pessoa e adicionar memórias
        $person = new Person();
        $person->addMemory('Foi para a escola');
        $person->addMemory('Aprendeu PHP');

        // Passo 2: Salvar o estado atual
        $memory = $person->save();

        // Passo 3: Inicializar MemoryLibrary e guardar a memória
        $memoryLibrary = new MemoryLibrary();
        $memoryLibrary->saveMemory($memory);

        // Passo 4: Modificar as memórias da Pessoa
        $person->addMemory('Comeu sushi');

        // Assertivas antes de restaurar
        $this->assertEquals(['Foi para a escola', 'Aprendeu PHP', 'Comeu sushi'], $person->save()->getState());

        // Passo 5: Restaurar o estado original a partir do MemoryLibrary
        $restoredMemory = $memoryLibrary->getLastMemory();
        $person->restore($restoredMemory);

        // Assertivas após restaurar
        $this->assertEquals(['Foi para a escola', 'Aprendeu PHP'], $person->save()->getState());
    }
}
