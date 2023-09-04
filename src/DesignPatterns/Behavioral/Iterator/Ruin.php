<?php

namespace GrowthCode\DesignPatterns\Behavioral\Iterator;

use Iterator;
use Countable;


class Ruin implements RoomAggregate, Countable
{
    private RoomCollection $rooms;

    public function __construct(RoomCollection $rooms)
    {
        $this->rooms = $rooms;
    }

    public function getIterator(): Iterator
    {
        return $this->rooms->getIterator();
    }

    public function count(): int
    {
        return $this->rooms->count();
    }
}
