<?php

namespace InternalLinking\Generator;

final class TextTransformPreference
{
    private bool $textAsArray;

    public function __construct(bool $textAsArray)
    {
        $this->textAsArray = $textAsArray;
    }

    /**
     * @return bool
     */
    public function shouldReturnTextAsArray(): bool
    {
        return $this->textAsArray;
    }
}
