<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

use ArrayObject;

// ConcreteExpressions
class Sentence implements Expression
{
    use InterpreterHelper;

    private ArrayObject $words;

    public function __construct(Expression ...$words)
    {
        $this->words = new ArrayObject($words);
    }

    public function interpret(Context $context): string
    {
        return $this->process($this->words, $context);
    }
}
