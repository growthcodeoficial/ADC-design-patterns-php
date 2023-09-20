<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Observer;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Observer\Watchtower;
use GrowthCode\DesignPatterns\Behavioral\Observer\Guard;

class ObserverTest extends TestCase
{
    public function testObserverPattern(): void
    {
        $watchtower = new Watchtower();

        // Criando Mock objects para Guard
        $guard1 = $this->createMock(Guard::class);
        $guard2 = $this->createMock(Guard::class);

        // Configurando as expectativas para os Mock objects
        $guard1->expects($this->once())
            ->method('update')
            ->with($this->identicalTo($watchtower));

        $guard2->expects($this->once())
            ->method('update')
            ->with($this->identicalTo($watchtower));

        $watchtower->attach($guard1);
        $watchtower->attach($guard2);

        // Disparando o evento que deverá notificar os guardas
        $watchtower->triggerEvent("Invasor avistado");

        // Verificando o estado do objeto Watchtower
        $this->assertEquals("Invasor avistado", $watchtower->getEvent());
    }
}
