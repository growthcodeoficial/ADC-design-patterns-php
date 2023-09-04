<?php

namespace GrowthCode\DesignPatterns\Structural\Composite;

class Painting implements Artwork
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function display(): string
    {
        return "Pintura: {$this->title}";
    }
}
