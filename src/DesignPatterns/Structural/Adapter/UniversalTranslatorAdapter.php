<?php

namespace GrowthCode\DesignPatterns\Structural\Adapter;

class UniversalTranslatorAdapter implements TranslatorInterface
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function translate(string $text, string $language): string
    {
        return $this->translator->translate($text, $language);
    }
}
