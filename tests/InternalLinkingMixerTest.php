<?php

use InternalLinking\Exceptions\CSVFileNotParsedException;
use InternalLinking\Exceptions\FileReaderNotFoundException;
use InternalLinking\Exceptions\TextTransformStrategyNotFoundException;
use InternalLinking\InternalLinkingMixer;
use PHPUnit\Framework\TestCase;

final class InternalLinkingMixerTest extends TestCase
{
    /**
     * @return void
     * @throws CSVFileNotParsedException
     * @throws FileReaderNotFoundException
     * @throws TextTransformStrategyNotFoundException
     */
    public function testCanParseStorageFile(): void
    {
        $internalLinkingMixer = new InternalLinkingMixer();
        $text = $internalLinkingMixer
            ->parseStorageFile('storage/test-file.csv', ';')
            ->generate()
            ->get();

        self::assertIsArray($text);
    }
}
