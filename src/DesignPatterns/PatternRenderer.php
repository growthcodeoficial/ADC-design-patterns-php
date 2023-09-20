<?php

namespace GrowthCode\DesignPatterns;

use ArrayObject;

class PatternRenderer
{
    private ArrayObject $patterns;

    public function __construct()
    {
        $this->patterns = new ArrayObject();
    }

    public function addPattern(Pattern $pattern): void
    {
        $this->patterns->append($pattern);
    }

    public function renderSummary(): string
    {
        $summary = '<h1>Sumário dos Padrões de Projetos</h1>';
        $categories = $this->organizePatternsByCategory();

        foreach ($categories as $category => $patterns) {
            $summary .= "<h2>" . ucfirst($category) . " Patterns</h2><ul>";
            $summary .= $this->renderPatternsList($patterns);
            $summary .= '</ul>';
        }

        return $summary;
    }

    private function organizePatternsByCategory(): ArrayObject
    {
        $categories = new ArrayObject();
        foreach ($this->patterns as $pattern) {
            $category = $pattern->getCategory();
            if (!isset($categories[$category])) {
                $categories[$category] = new ArrayObject();
            }
            $categories[$category]->append($pattern);
        }
        return $categories;
    }

    private function renderPatternsList(ArrayObject $patterns): string
    {
        $list = '';
        foreach ($patterns as $pattern) {
            $name = $pattern->getName();
            $category = $pattern->getCategory();
            $list .= "<li><a href=\"?pattern={$name}&category={$category}\">" . ucfirst($name) . "</a></li>";
        }
        return $list;
    }

    public function renderPattern(string $name, string $category): string
    {
        foreach ($this->patterns as $pattern) {
            if ($pattern->getName() === $name && $pattern->getCategory() === $category) {
                return $this->renderPatternContent($pattern);
            }
        }
        return '<h2>Pattern not found</h2>';
    }

    private function renderPatternContent(Pattern $pattern): string
    {
        $readmePath = $pattern->getReadmePath();
        if (file_exists($readmePath)) {
            $readmeContent = file_get_contents($readmePath);
            return "<h2>" . ucfirst($pattern->getName()) . "</h2><pre>" . htmlspecialchars($readmeContent) . "</pre>";
        }
        return '<h2>Pattern not found</h2>';
    }
}
