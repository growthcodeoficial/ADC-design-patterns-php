<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Product
interface Bread
{
    public function taste(): string;
    public function setYeast(Yeast $yeast): void;
    public function setSalt(Salt $salt): void;
}
