<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

final class ContentBasedRecommender implements RecommenderStrategyInterface
{
    use IgnoreContentTrait;
    private array $recommendations = [];

    public function updateRecommendations(Context $context): array
    {
        // Suponhamos que o contexto tenha um método getCoursesCompleted que retorne os cursos concluídos pelo usuário
        $coursesCompleted = $context->getRecentActivities()->getActivities('recentArticles');

        // Implementar a lógica para atualizar as recomendações com base em cursos
        $allRecommendations = [
            ['id' => 1, 'name' => 'Curso básico de Python', 'difficulty' => 'Beginner', 'cost' => 0],
            ['id' => 2, 'name' => 'Curso avançado de Python', 'difficulty' => 'Advanced', 'cost' => 50],
            ['id' => 3, 'name' => 'Curso de JavaScript para iniciantes', 'difficulty' => 'Beginner', 'cost' => 10],
            ['id' => 4, 'name' => 'Curso de Machine Learning', 'difficulty' => 'Intermediate', 'cost' => 30],
            ['id' => 5, 'name' => 'Curso de Desenvolvimento Web', 'difficulty' => 'Intermediate', 'cost' => 20]
        ];

        // Filtrar recomendações com base nos cursos concluídos
        $this->recommendations = array_filter($allRecommendations, function ($recommendation) use ($coursesCompleted) {
            return !in_array($recommendation['name'], $coursesCompleted);
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
