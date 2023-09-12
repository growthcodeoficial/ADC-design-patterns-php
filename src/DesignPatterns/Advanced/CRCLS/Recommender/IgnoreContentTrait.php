<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

trait IgnoreContentTrait
{
    private array $ignoredContent = [];

    public function ignoreContent(string $contentId): void
    {
        $this->ignoredContent[] = ['id' => $contentId];
    }

    public function getIgnoredContent(): array
    {
        return $this->ignoredContent;
    }
}
