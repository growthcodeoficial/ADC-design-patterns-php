<?php

namespace GrowthCode\DesignPatterns\Behavioral\TemplateMethod;

abstract class AbstractRecipe
{
    final public function prepareDish(): void
    {
        $this->boilWater();
        $this->addPrimaryIngredients();
        $this->cook();
        $this->addSeasonings();
        $this->serve();
    }

    private function boilWater(): void
    {
        echo "Boiling water.\n";
    }

    abstract protected function addPrimaryIngredients(): void;

    private function cook(): void
    {
        echo "Cooking ingredients.\n";
    }

    abstract protected function addSeasonings(): void;

    private function serve(): void
    {
        echo "Serving the dish.\n";
    }
}
