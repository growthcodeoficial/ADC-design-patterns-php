<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

final class VideoBasedRecommender implements RecommenderStrategyInterface
{
    use IgnoreContentTrait;
    private array $recommendations = [];
    private const ALL_RECOMMENDATIONS = [
        ['id' => 'V01', 'name' => 'Como usar o terminal Linux', 'difficulty' => 'Beginner', 'cost' => 0],
        ['id' => 'V02', 'name' => 'Construindo uma aplicação com React', 'difficulty' => 'Advanced', 'cost' => 5],
        ['id' => 'V03', 'name' => 'Introdução ao SQL', 'difficulty' => 'Beginner', 'cost' => 0],
        ['id' => 'V04', 'name' => 'Deploy com Kubernetes', 'difficulty' => 'Advanced', 'cost' => 10],
        ['id' => 'V05', 'name' => 'Testes unitários em Python', 'difficulty' => 'Intermediate', 'cost' => 0]
    ];

    public function updateRecommendations(Context $context): array
    {
        // Suponhamos que o contexto tenha um método getRecentActivities que retorne as atividades recentes do usuário
        $recentVideos = $context->getRecentActivities()->getActivities('recentVideos');

        // Filtrar recomendações com base nos vídeos assistidos recentemente
        $this->recommendations = array_filter(self::ALL_RECOMMENDATIONS, function ($recommendation) use ($recentVideos) {
            return !in_array($recommendation['name'], $recentVideos);
        });

        // Remover conteúdo ignorado
        $this->recommendations = array_udiff($this->recommendations, $this->ignoredContent, function ($recommendations, $ignoredContent) {
            return strcmp($recommendations['id'], $ignoredContent['id']);
        });

        return $this->recommendations;
    }

    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
