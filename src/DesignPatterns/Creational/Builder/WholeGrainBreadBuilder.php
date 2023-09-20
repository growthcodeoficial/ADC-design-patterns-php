<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Concrete Builder
class WholeGrainBreadBuilder implements BreadBuilder
{
    private Bread $bread;

    public function __construct()
    {
        $this->bread = new WholeGrainBread();
    }

    public function addYeast(): void
    {
        $this->bread->setYeast(new ActiveYeast());
    }

    public function addSalt(): void
    {
        $this->bread->setSalt(new SeaSalt());
    }

    public function getResult(): Bread
    {
        return $this->bread;
    }
}
