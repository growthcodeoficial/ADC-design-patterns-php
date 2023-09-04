<?php

namespace GrowthCode\DesignPatterns\Behavioral\Iterator;

// Client Code
class Archaeologist
{
    private RoomAggregate $location;

    public function __construct(RoomAggregate $location)
    {
        $this->location = $location;
    }

    public function explore(): void
    {
        $iterator = $this->location->getIterator();

        echo "Explorando as ruínas...\n";
        foreach ($iterator as $room) {
            echo "Entrando na sala: $room\n";
        }
    }
}
