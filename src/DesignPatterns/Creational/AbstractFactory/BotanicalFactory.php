<?php

namespace GrowthCode\DesignPatterns\Creational\AbstractFactory;

interface BotanicalFactory
{
    public function createFlower(): Flower;
    public function createTree(): Tree;
}
