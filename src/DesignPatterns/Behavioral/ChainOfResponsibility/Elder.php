<?php

namespace GrowthCode\DesignPatterns\Behavioral\ChainOfResponsibility;

interface Elder
{
    public function setNextElder(Elder $elder): Elder;
    public function advise(string $problemType): ?string;
}
