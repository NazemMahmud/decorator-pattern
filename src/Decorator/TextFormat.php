<?php

namespace Piash\DecoratorPattern\Decorator;


use Piash\DecoratorPattern\Interface\InputFormat;

/**
 * Base Decorator class: doesn't contain any real filtering or formatting logic.
 * Main purpose: to implement the basic decoration infrastructure:
 * $inputFormat: a field for storing a wrapped component or another decorator and the basic formatting method
 * that delegates the work to the wrapped object.
 * Real formatting job is done by subclasses.
 */
class TextFormat implements InputFormat
{
    /**
     * @var InputFormat
     */
    protected InputFormat $inputFormat;

    public function __construct(InputFormat $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }


    /**
     * Decorator delegates all work to a wrapped component.
     */
    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}
