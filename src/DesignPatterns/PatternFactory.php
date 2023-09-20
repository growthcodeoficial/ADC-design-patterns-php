<?php

namespace GrowthCode\DesignPatterns;

use SplObjectStorage;

class PatternFactory
{
    public function createPatternsFromCategories(array $categories, string $patternsPath): SplObjectStorage
    {
        $patterns = new SplObjectStorage();
        foreach ($categories as $category) {
            $patternDirectories = glob($patternsPath . $category . '/*', GLOB_ONLYDIR);
            foreach ($patternDirectories as $patternDir) {
                $patternName = basename($patternDir);
                $patterns->attach(new Pattern($patternName, $category, $patternsPath));
            }
        }
        return $patterns;
    }
}
