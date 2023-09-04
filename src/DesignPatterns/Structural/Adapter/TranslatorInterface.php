<?php

namespace GrowthCode\DesignPatterns\Structural\Adapter;

interface TranslatorInterface
{
    public function translate(string $text, string $toLanguage): string;
}
