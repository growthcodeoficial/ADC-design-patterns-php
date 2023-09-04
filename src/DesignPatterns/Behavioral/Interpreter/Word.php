<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

// ConcreteExpression
class Word implements Expression
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function interpret(Context $context): string
    {
        return $context[$this->value] ?? $this->value;
    }
}
