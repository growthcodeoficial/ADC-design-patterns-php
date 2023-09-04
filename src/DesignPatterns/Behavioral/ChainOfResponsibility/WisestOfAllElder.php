<?php

namespace GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility;

// O mais sábio de todos os anciãos 
class WisestOfAllElder extends WiserElder
{
    public function advise(string $problemType): ?string
    {
        return "Take a deep breath and consider the Universe.";
    }
}
