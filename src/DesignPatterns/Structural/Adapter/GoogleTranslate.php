<?php

namespace GrowthCode\DesignPatterns\Structural\Adapter;

class GoogleTranslate implements TranslatorInterface
{
    public function translate(string $text, string $toLanguage): string
    {
        return "Translated by Google: {$text} to {$toLanguage}";
    }
}
