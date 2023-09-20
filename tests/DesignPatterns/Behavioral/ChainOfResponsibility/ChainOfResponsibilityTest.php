<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\ChainOfResponsibility;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility\NoviceElder;
use GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility\WiseElder;
use GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility\WiserElder;
use GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility\WisestOfAllElder;

final class ChainOfResponsibilityTest extends TestCase
{
    public function testChain(): void
    {
        $noviceElder = new NoviceElder();
        $wiseElder = new WiseElder();
        $wiserElder = new WiserElder();
        $wisestOfAllElder = new WisestOfAllElder();

        $noviceElder->setNextElder($wiseElder)
            ->setNextElder($wiserElder)
            ->setNextElder($wisestOfAllElder);

        $this->assertSame("Just be yourself.", $noviceElder->advise("verySimple"));
        $this->assertSame("Use common sense.", $noviceElder->advise("simple"));
        $this->assertSame("Think before you act.", $noviceElder->advise("complex"));
        $this->assertSame("Take a deep breath and consider the Universe.", $noviceElder->advise("veryComplex"));
    }
}
