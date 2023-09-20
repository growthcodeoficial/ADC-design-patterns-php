<?php

namespace GrowthCode\Tests\DesignPatterns\Structural\Composite;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Structural\Composite\Painting;
use GrowthCode\DesignPatterns\Structural\Composite\ArtMural;

final class ArtworkTest extends TestCase
{
    public function testPaintingDisplay(): void
    {
        $painting = new Painting("Mona Lisa");
        $expected = "Pintura: Mona Lisa";
        $this->assertEquals($expected, $painting->display());
    }

    public function testDisplay(): void
    {
        $painting1 = new Painting("Mona Lisa");
        $painting2 = new Painting("O Grito");

        $mural = new ArtMural();
        $mural->addArtwork($painting1);
        $mural->addArtwork($painting2);

        $expected = "Exibindo um mural de arte composto por:\n- Pintura: Mona Lisa\n- Pintura: O Grito\n";

        $this->assertEquals($expected, $mural->display());
    }
}
