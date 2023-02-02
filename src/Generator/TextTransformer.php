<?php

namespace InternalLinking\Generator;

interface TextTransformer
{
    public function transformText(array $parsedCVSFile): array;
}
