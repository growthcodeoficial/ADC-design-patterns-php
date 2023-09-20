<?php

namespace GrowthCode\DesignPatterns\Structural\Adapter;

class TranslationService
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function requestTranslation(string $text, string $toLanguage): string
    {
        return $this->translator->translate($text, $toLanguage);
    }
}
