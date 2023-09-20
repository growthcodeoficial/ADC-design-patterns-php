<?php

namespace GrowthCode\DesignPatterns\Creational\CombiningPatterns\Repository;

use GrowthCode\DesignPatterns\Creational\CombiningPatterns\Entity\EntityInterface;

interface RepositoryInterface
{
    public function add(EntityInterface $entity): bool;
}
