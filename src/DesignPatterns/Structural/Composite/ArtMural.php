<?php

namespace GrowthCode\DesignPatterns\Structural\Composite;

use SplObjectStorage;

class ArtMural extends SplObjectStorage implements Artwork
{
    public function addArtwork(Artwork $artwork): void
    {
        $this->attach($artwork);
    }

    public function removeArtwork(Artwork $artwork): void
    {
        $this->detach($artwork);
    }

    public function display(): string
    {
        $display = "Exibindo um mural de arte composto por:\n";
        foreach ($this as $artwork) {
            $display .= "- " . $artwork->display() . "\n";
        }
        return $display;
    }
}
