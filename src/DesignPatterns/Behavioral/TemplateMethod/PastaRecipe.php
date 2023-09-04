<?php

namespace GrowthCode\DesignPatterns\Behavioral\TemplateMethod;

class PastaRecipe extends AbstractRecipe
{
    protected function addPrimaryIngredients(): void
    {
        echo "Adding pasta.\n";
    }

    protected function addSeasonings(): void
    {
        echo "Adding salt and herbs.\n";
    }
}
