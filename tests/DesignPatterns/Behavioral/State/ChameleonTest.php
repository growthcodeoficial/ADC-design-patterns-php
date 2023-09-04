<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\State;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\State\Chameleon;
use GrowthCode\DesignPatterns\Behavioral\State\GreenState;
use GrowthCode\DesignPatterns\Behavioral\State\BrownState;
use GrowthCode\DesignPatterns\Behavioral\State\BlueState;

class ChameleonTest extends TestCase
{
    public function testInitialStateIsGreen()
    {
        $chameleon = new Chameleon(new GreenState());
        $this->assertInstanceOf(GreenState::class, $chameleon->getState());
    }

    public function testStateChangesFromGreenToBrown()
    {
        $chameleon = new Chameleon(new GreenState());
        $chameleon->changeColor();
        $this->assertInstanceOf(BrownState::class, $chameleon->getState());
    }

    public function testStateChangesFromBrownToBlue()
    {
        $chameleon = new Chameleon(new BrownState());
        $chameleon->changeColor();
        $this->assertInstanceOf(BlueState::class, $chameleon->getState());
    }

    public function testStateChangesFromBlueToGreen()
    {
        $chameleon = new Chameleon(new BlueState());
        $chameleon->changeColor();
        $this->assertInstanceOf(GreenState::class, $chameleon->getState());
    }

    public function testStateChangeSequence()
    {
        ob_start();  // Inicia captura da saída

        $chameleon = new Chameleon(new GreenState());
        $chameleon->changeColor();  // Esperado: "The chameleon is now green!"
        $chameleon->changeColor();  // Esperado: "The chameleon is now brown!"
        $chameleon->changeColor();  // Esperado: "The chameleon is now blue!"
        $chameleon->changeColor();  // Esperado: "The chameleon is now green!"

        $output = ob_get_clean();  // Obtém a saída capturada

        $expectedOutput = "The chameleon is now green!\n"
                        . "The chameleon is now brown!\n"
                        . "The chameleon is now blue!\n"
                        . "The chameleon is now green!\n";

        $this->assertEquals($expectedOutput, $output);
    }
}
