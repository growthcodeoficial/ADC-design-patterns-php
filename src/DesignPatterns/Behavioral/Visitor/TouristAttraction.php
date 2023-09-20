<?php

namespace GrowthCode\DesignPatterns\Behavioral\Visitor;

interface TouristAttraction
{
    public function accept(Tourist $tourist): void;
}
