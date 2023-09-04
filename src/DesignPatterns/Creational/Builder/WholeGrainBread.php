<?php

namespace GrowthCode\DesignPatterns\Creational\Builder;

// Concrete Product
class WholeGrainBread implements Bread
{
    private Yeast $yeast;
    private Salt $salt;

    public function setYeast(Yeast $yeast): void
    {
        $this->yeast = $yeast;
    }

    public function setSalt(Salt $salt): void
    {
        $this->salt = $salt;
    }

    public function taste(): string
    {
        return "{$this->yeast->getType()} + {$this->salt->getType()}";
    }
}
