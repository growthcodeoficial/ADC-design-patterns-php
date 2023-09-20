<?php

namespace GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility;

// Ancião Mais Sábio
class WiserElder extends WiseElder
{
    public function advise(string $problemType): ?string
    {
        if ($problemType === "complex") {
            return "Think before you act.";
        } else if ($this->nextElder) {
            return $this->nextElder->advise($problemType);
        }
        return null;
    }
}
