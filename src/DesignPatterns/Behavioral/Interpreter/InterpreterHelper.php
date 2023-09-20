<?php

namespace GrowthCode\DesignPatterns\Behavioral\Interpreter;

use ArrayObject;

trait InterpreterHelper
{
    public function process(ArrayObject $elements, Context $context): string
    {
        return implode(
            ' ',
            array_map(
                fn ($element) => $element->interpret($context),
                iterator_to_array($elements->getIterator())
            )
        );
    }
}
