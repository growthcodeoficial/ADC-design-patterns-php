<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

final class VideoBasedRecommender implements RecommenderStrategyInterface
{
    use IgnoreContentTrait;
    private array $recommendations = [];

    public function updateRecommendations(Context $context): array
    {
        // Suponhamos que o contexto tenha um método getRecentActivities que retorne as atividades recentes do usuário
        $recentVideos = $context->getRecentActivities()->getActivities('recentVideos');

        // Implementar a lógica para atualizar as recomendações com base em vídeos
        $allRecommendations = [
            ['id' => 1, 'name' => 'Como usar o terminal Linux', 'difficulty' => 'Beginner', 'cost' => 0],
            ['id' => 2, 'name' => 'Construindo uma aplicação com React', 'difficulty' => 'Advanced', 'cost' => 5],
            ['id' => 3, 'name' => 'Introdução ao SQL', 'difficulty' => 'Beginner', 'cost' => 0],
            ['id' => 4, 'name' => 'Deploy com Kubernetes', 'difficulty' => 'Advanced', 'cost' => 10],
            ['id' => 5, 'name' => 'Testes unitários em Python', 'difficulty' => 'Intermediate', 'cost' => 0]
        ];

        // Filtrar recomendações com base nos vídeos assistidos recentemente
        $this->recommendations = array_filter($allRecommendations, function ($recommendation) use ($recentVideos) {
            return !in_array($recommendation['name'], $recentVideos);
        });

        // Remover conteúdo ignorado
        $this->recommendations = array_udiff($this->recommendations, $this->ignoredContent, function ($a, $b) {
            return $a['id'] - $b['id'];
        });

        return $this->recommendations;
    }


    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
