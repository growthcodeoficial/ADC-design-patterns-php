<?php

namespace GrowthCode\DesignPatterns\Behavioral\Visitor;

class AdventurousTourist implements Tourist
{
    public function visitMuseum(Museum $museum): string
    {
        return $museum->admireArt();
    }

    public function visitBeach(Beach $beach): string
    {
        return $beach->relax();
    }
}
