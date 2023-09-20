<?php

namespace GrowthCode\DesignPatterns\Behavioral\Iterator;

use ArrayObject;

final class RoomCollection extends ArrayObject
{
    public static function createWithDefaultRooms(): RoomCollection
    {
        return new self(["Sala 1", "Sala 2", "Sala do Tesouro"]);
    }
}
