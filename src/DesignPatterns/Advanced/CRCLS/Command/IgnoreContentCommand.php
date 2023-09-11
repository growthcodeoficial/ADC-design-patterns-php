<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Command;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender\IgnorerStrategyInterface;

class IgnoreContentCommand
{
    private  $recommender;
    private array $ignoredContent = [];

    public function __construct(IgnorerStrategyInterface $recommender)
    {
        $this->recommender = $recommender;
    }

    public function execute(string $contentId): void
    {
        // Implementar a lógica para ignorar o conteúdo específico nas futuras recomendações
        $this->recommender->ignoreContent($contentId);
    }

    public function ignoreContent($contentId): void
    {
        $this->ignoredContent[] = $contentId;
    }
}
