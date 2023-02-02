<?php

namespace InternalLinking\Generator;

use InternalLinking\Exceptions\TextTransformStrategyNotFoundException;

final class TextWithInternalLinkingGenerator
{
    private array $transformedParsedCVSFileAsArray = [];

    /**
     * @param array $parsedCVSFile
     * @param TextTransformPreference $textTransformPreference
     * @return void
     * @throws TextTransformStrategyNotFoundException
     */
    public function transformText(array $parsedCVSFile, TextTransformPreference $textTransformPreference): void
    {
        $strategy = $this->determineStrategy($textTransformPreference);
        $this->transformedParsedCVSFileAsArray = $strategy->transformText($parsedCVSFile);
    }

    public function getTransformedTextAsArray(): array
    {
        return $this->transformedParsedCVSFileAsArray;
    }

    /**
     * @param TextTransformPreference $textTransformPreference
     * @return TextTransformer
     * @throws TextTransformStrategyNotFoundException
     */
    private function determineStrategy(TextTransformPreference $textTransformPreference): TextTransformer
    {
        if ($textTransformPreference->shouldReturnTextAsArray()) {
            return new TextAsArrayWithLinks();
        }

        throw new TextTransformStrategyNotFoundException();
    }
}
