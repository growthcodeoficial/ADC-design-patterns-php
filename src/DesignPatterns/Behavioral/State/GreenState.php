<?php

namespace GrowthCode\DesignPatterns\Behavioral\State;

class GreenState implements ChameleonState
{
    public function changeColor(Chameleon $chameleon): void
    {
        echo "The chameleon is now green!\n";
        $chameleon->setState(new BrownState());
    }
}
