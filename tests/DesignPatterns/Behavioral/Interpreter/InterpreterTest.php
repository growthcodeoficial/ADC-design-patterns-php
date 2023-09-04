<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Interpreter;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Interpreter\Word;
use GrowthCode\DesignPatterns\Behavioral\Interpreter\Sentence;
use GrowthCode\DesignPatterns\Behavioral\Interpreter\Concat;
use GrowthCode\DesignPatterns\Behavioral\Interpreter\Context;
use GrowthCode\DesignPatterns\Behavioral\Interpreter\LanguageProcessor;

final class InterpreterTest extends TestCase
{
    public function testWordInterpret(): void
    {
        $context = new Context();
        $context->set("greeting", "Hello");

        $word = new Word("greeting");
        $result = $word->interpret($context);

        $this->assertEquals("Hello", $result);
    }

    public function testSentenceInterpret(): void
    {
        $context = new Context();
        $context->set("greeting", "Hello");
        $context->set("name", "John");

        $sentence = new Sentence(new Word("greeting"), new Word("name"));
        $result = $sentence->interpret($context);

        $this->assertEquals("Hello John", $result);
    }

    public function testConcatInterpret(): void
    {
        $context = new Context();
        $context->set("begin", "Start");
        $context->set("middle", "Middle");
        $context->set("end", "End");

        $concat = new Concat(
            new Sentence(new Word("begin")),
            new Sentence(new Word("middle")),
            new Sentence(new Word("end"))
        );

        $result = $concat->interpret($context);
        $this->assertEquals("Start Middle End", $result);
    }

    public function testLanguageProcessor(): void
    {
        $context = new Context();
        $context->set("greeting", "Hello");
        $context->set("name", "John");

        $sentence = new Sentence(new Word("greeting"), new Word("name"));
        $processor = new LanguageProcessor();

        $result = $processor->execute($sentence, $context);
        $this->assertEquals("Hello John", $result);
    }
}
