<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\EntityHelper;

final class SqlQueryBuilder
{
    public static function buildInsertQuery(string $tableName, array $attributes): string
    {
        $columns = implode(', ', array_keys($attributes));

        $values = array_map(function ($value) {
            return is_string($value) ? "'{$value}'" : $value;
        }, $attributes);

        $values = implode(', ', $values);

        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
    }
}
