<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Recommender;

use GrowthCode\DesignPatterns\Advanced\CRCLS\Context\Context;

final class CourseBasedRecommender implements RecommenderStrategyInterface
{
    use IgnoreContentTrait;
    private array $recommendations = [];
    private const ALL_RECOMMENDATIONS = [
        ['id' => 'CS01', 'name' => 'Curso básico de Python', 'difficulty' => 'Beginner', 'cost' => 0],
        ['id' => 'CS02', 'name' => 'Curso avançado de Python', 'difficulty' => 'Advanced', 'cost' => 50],
        ['id' => 'CS03', 'name' => 'Curso de JavaScript para iniciantes', 'difficulty' => 'Beginner', 'cost' => 10],
        ['id' => 'CS04', 'name' => 'Curso de Machine Learning', 'difficulty' => 'Intermediate', 'cost' => 30],
        ['id' => 'CS05', 'name' => 'Curso de Desenvolvimento Web', 'difficulty' => 'Intermediate', 'cost' => 20]
    ];

    public function updateRecommendations(Context $context): array
    {
        // Suponhamos que o contexto tenha um método getRecentActivities que retorne as atividades recentes do usuário
        $recentCourses = $context->getRecentActivities()->getActivities('recentCourses');

        // Filtrar recomendações com base nos cursos concluídos recentemente
        $this->recommendations = array_filter(self::ALL_RECOMMENDATIONS, function ($recommendation) use ($recentCourses) {
            return !in_array($recommendation['name'], $recentCourses);
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
