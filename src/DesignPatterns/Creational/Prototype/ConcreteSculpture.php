<?php

namespace GrowthCode\DesignPatterns\Creational\Prototype;

class ConcreteSculpture implements SculpturePrototype
{
    public string $material;

    public function __construct(string $material)
    {
        $this->material = $material;
    }

    public function clone(): SculpturePrototype
    {
        return clone $this;
    }
}
