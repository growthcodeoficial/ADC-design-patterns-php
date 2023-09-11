<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

trait IgnoreContentTrait
{
    private array $ignoredContent = [];
    
    public function ignoreContent($contentId): void
    {
        $this->ignoredContent[] = $contentId;
    }
}
