<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Entity;

abstract class Entity implements EntityInterface
{
    public function getAttributes(): array
    {
        $attributes = [];
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $attributes[$property->getName()] = $property->getValue($this);
        }
        return $attributes;
    }
}
