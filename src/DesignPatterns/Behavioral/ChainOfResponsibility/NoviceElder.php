<?php

namespace GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility;

// Ansião Novato 
class NoviceElder implements Elder
{
    protected ?Elder $nextElder = null;

    public function setNextElder(Elder $elder): Elder
    {
        $this->nextElder = $elder;
        return $elder;
    }

    public function advise(string $problemType): ?string
    {
        if ($problemType === "verySimple") {
            return "Just be yourself.";
        } else if ($this->nextElder) {
            return $this->nextElder->advise($problemType);
        }
        return null;
    }
}
