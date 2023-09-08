<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Adapter;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Adapter\UniversalTranslatorAdapter;
use GrowthCode\DesignPatterns\Structural\Adapter\GoogleTranslate;
use GrowthCode\DesignPatterns\Structural\Adapter\MicrosoftTranslate;
use GrowthCode\DesignPatterns\Structural\Adapter\TranslationService;

final class UniversalTranslatorAdapterTest extends TestCase
{
    public function testTranslateWithGoogle(): void
    {
        $googleTranslate = new GoogleTranslate();
        $adapter = new UniversalTranslatorAdapter($googleTranslate);
        $service = new TranslationService($adapter);

        $result = $service->requestTranslation("Hello", "French");

        $this->assertSame("Translated by Google: Hello to French", $result);
    }

    public function testTranslateWithMicrosoft(): void
    {
        $microsoftTranslate = new MicrosoftTranslate();
        $adapter = new UniversalTranslatorAdapter($microsoftTranslate);
        $service = new TranslationService($adapter);

        $result = $service->requestTranslation("Hello", "Spanish");

        $this->assertSame("Translated by Microsoft: Hello to Spanish", $result);
    }

    public function testSwitchTranslationServices(): void
    {
        $googleTranslate = new GoogleTranslate();
        $microsoftTranslate = new MicrosoftTranslate();

        $service = new TranslationService(new UniversalTranslatorAdapter($googleTranslate));
        $result1 = $service->requestTranslation("Hello", "French");

        $service = new TranslationService(new UniversalTranslatorAdapter($microsoftTranslate));
        $result2 = $service->requestTranslation("Hello", "Spanish");

        $this->assertSame("Translated by Google: Hello to French", $result1);
        $this->assertSame("Translated by Microsoft: Hello to Spanish", $result2);
    }
}
