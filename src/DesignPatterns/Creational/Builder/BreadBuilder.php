<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Builder
interface BreadBuilder
{
    public function addYeast(): void;
    public function addSalt(): void;
    public function getResult(): Bread;
}
