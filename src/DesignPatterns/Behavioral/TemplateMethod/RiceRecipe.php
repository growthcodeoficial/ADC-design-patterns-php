<?php

namespace GrowthCode\DesignPatterns\Behavioral\TemplateMethod;

class RiceRecipe extends AbstractRecipe
{
    protected function addPrimaryIngredients(): void
    {
        echo "Adding rice.\n";
    }

    protected function addSeasonings(): void
    {
        echo "Adding saffron and spices.\n";
    }
}
