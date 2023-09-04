<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Mediator;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Mediator\UnitedNations;
use GrowthCode\DesignPatterns\Behavioral\Mediator\USA;
use GrowthCode\DesignPatterns\Behavioral\Mediator\Russia;

final class MediatorTest extends TestCase
{
    public function testMediation(): void
    {
        $un = new UnitedNations();
        $usa = new USA($un);
        $russia = new Russia($un);

        // Registro dos países no mediador
        $un->addCountry($usa);
        $un->addCountry($russia);

        // Captura a saída padrão
        ob_start();

        // Execução: Enviar mensagens
        $usa->send("Queremos a paz.");
        $russia->send("Nós também queremos a paz.");

        // Fim da captura da saída
        $output = ob_get_clean();

        // Verificações: Conferir se as mensagens foram enviadas e recebidas
        $this->assertStringContainsString('USA enviando mensagem: Queremos a paz.', $output);
        $this->assertStringContainsString('Russia recebeu a mensagem: Queremos a paz.', $output);

        $this->assertStringContainsString('Russia enviando mensagem: Nós também queremos a paz.', $output);
        $this->assertStringContainsString('USA recebeu a mensagem: Nós também queremos a paz.', $output);
    }
}
