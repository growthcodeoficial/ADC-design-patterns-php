<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Facade;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Facade\OrchestraFacade;
use GrowthCode\DesignPatterns\Structural\Facade\Violin;
use GrowthCode\DesignPatterns\Structural\Facade\Trumpet;
use GrowthCode\DesignPatterns\Structural\Facade\Drums;
use GrowthCode\DesignPatterns\Structural\Facade\OrchestraClient;

final class OrchestraFacadeTest extends TestCase 
{
    public function testOrchestraPerformance(): void 
    {
        $orchestraFacade = new OrchestraFacade();
        $orchestraFacade->addInstrument(new Violin());
        $orchestraFacade->addInstrument(new Trumpet());
        $orchestraFacade->addInstrument(new Drums());

        $orchestraClient = new OrchestraClient($orchestraFacade);

        $result = $orchestraClient->orchestratePerformance();

        $this->assertEquals('Violin playing, Trumpet blowing, Drums beating', $result);
    }
}