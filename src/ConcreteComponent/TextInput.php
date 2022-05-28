<?php

namespace Piash\DecoratorPattern\ConcreteComponent;

use Piash\DecoratorPattern\Interface\InputFormat;

/**
 * This Concrete Component is a core element of decoration.
 * It contains the original text, without any filtering or formatting.
 */
class TextInput implements InputFormat
{
    public function formatText(string $text): string
    {
        return $text;
    }
}
