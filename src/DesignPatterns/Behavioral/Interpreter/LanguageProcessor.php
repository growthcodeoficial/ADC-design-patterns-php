<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

// Client
class LanguageProcessor
{
    public function execute(Expression $expression, Context $context): string
    {
        return $expression->interpret($context);
    }
}
