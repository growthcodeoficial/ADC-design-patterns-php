<?php

namespace GrowthCode\DesignPatterns\Creational\Prototype;

interface SculpturePrototype
{
    public function clone(): SculpturePrototype;
}
