<?php

namespace GrowthCode\DesignPatterns\Behavioral\State;

class BrownState implements ChameleonState
{
    public function changeColor(Chameleon $chameleon): void
    {
        echo "The chameleon is now brown!\n";
        $chameleon->setState(new BlueState());
    }
}
