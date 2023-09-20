<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

// AbstractExpression
interface Expression
{
    public function interpret(Context $context): string;
}
