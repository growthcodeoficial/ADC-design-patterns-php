<?php

namespace GrowthCode\DesignPatterns\Behavioral\State;

class BlueState implements ChameleonState
{
    public function changeColor(Chameleon $chameleon): void
    {
        echo "The chameleon is now blue!\n";
        $chameleon->setState(new GreenState());
    }
}
