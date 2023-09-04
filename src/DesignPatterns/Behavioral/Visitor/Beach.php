<?php

namespace GrowthCode\DesignPatterns\Behavioral\Visitor;

class Beach implements TouristAttraction
{
    public function accept(Tourist $tourist): void
    {
        $tourist->visitBeach($this);
    }

    public function relax(): string
    {
        return "Relaxing on the beach\n";
    }
}
