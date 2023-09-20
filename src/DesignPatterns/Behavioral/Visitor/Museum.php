<?php

namespace GrowthCode\DesignPatterns\Behavioral\Visitor;

class Museum implements TouristAttraction
{
    public function accept(Tourist $tourist): void
    {
        $tourist->visitMuseum($this);
    }

    public function admireArt(): string
    {
        return "Admiring art in the museum\n";
    }
}
