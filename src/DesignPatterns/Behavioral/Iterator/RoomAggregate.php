<?php

namespace GrowthCode\DesignPatterns\Behavioral\Iterator;

use Iterator;

interface RoomAggregate
{
    public function getIterator(): Iterator;
}
