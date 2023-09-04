<?php

namespace GrowthCode\DesignPatterns\Behavioral\State;

// State
interface ChameleonState {
    public function changeColor(Chameleon $chameleon): void;
}
