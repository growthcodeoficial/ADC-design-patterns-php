<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\TemplateMethod;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\TemplateMethod\PastaRecipe;
use GrowthCode\DesignPatterns\Behavioral\TemplateMethod\RiceRecipe;

final class TemplateMethodTest extends TestCase
{
    public function testPastaRecipe(): void
    {
        $recipe = new PastaRecipe();
        $this->expectOutputString("Boiling water.\nAdding pasta.\nCooking ingredients.\nAdding salt and herbs.\nServing the dish.\n");
        $recipe->prepareDish();
    }

    public function testRiceRecipe(): void
    {
        $recipe = new RiceRecipe();
        $this->expectOutputString("Boiling water.\nAdding rice.\nCooking ingredients.\nAdding saffron and spices.\nServing the dish.\n");
        $recipe->prepareDish();
    }
}
