<?php

namespace GrowthCode\DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

class Guard implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo "Guarda alertado sobre o evento:\n" . $subject->getEvent();
    }
}
