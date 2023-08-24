<?php

namespace GrowthCode\DesignPatterns;

final class Pattern
{
    private string $name;
    private string $category;
    private string $path;

    public function __construct(string $name, string $category, string $path)
    {
        $this->name = $name;
        $this->category = $category;
        $this->path = $path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getReadmePath(): string
    {
        return sprintf('%s/%s/%s/README.md', $this->path, $this->category, $this->name);
    }
}
