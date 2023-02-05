<?php

use InternalLinking\Exceptions\TextTransformStrategyNotFoundException;
use InternalLinking\Generator\TextTransformPreference;
use InternalLinking\Generator\TextWithInternalLinkingGenerator;
use PHPUnit\Framework\TestCase;

final class TextWithInternalLinkingGeneratorTest extends TestCase
{
    /**
     * @return void
     * @throws TextTransformStrategyNotFoundException
     */
    public function testGetTransformedText(): void
    {
        $initialArray = [
            [
                'https://a.com/target',
                'maxime',
                'Et just perspicatis ea quo dolor et debitis quae. Maxime voluptas molestias consequatur fugue.',
                'https://a.com/b',
            ]
        ];

        $textTransformPreference = new TextTransformPreference(true);
        $textWithInternalLinkingGenerator = new TextWithInternalLinkingGenerator();

        $textWithInternalLinkingGenerator->transformText($initialArray, $textTransformPreference);
        $transformedText = $textWithInternalLinkingGenerator->getTransformedTextAsArray();

        $expectedArray = [
            [
                'new_content' => "Et just perspicatis ea quo dolor et debitis quae. <a href='https://a.com/b'>Maxime</a> voluptas molestias consequatur fugue.",
                'old_content' => "Et just perspicatis ea quo dolor et debitis quae. Maxime voluptas molestias consequatur fugue.",
                'target_url' => "https://a.com/target",
            ]
        ];

        self::assertIsArray($transformedText);
        self::assertEquals(json_encode($expectedArray), json_encode($transformedText));
    }

    /**
     * @return void
     * @throws TextTransformStrategyNotFoundException
     */
    public function testCannotNotifyUserWithoutPreferenceAboutPasswordExpire(): void
    {
        self::expectException(TextTransformStrategyNotFoundException::class);

        $textTransformPreference = new TextTransformPreference(false);
        $textWithInternalLinkingGenerator = new TextWithInternalLinkingGenerator();

        $textWithInternalLinkingGenerator->transformText([], $textTransformPreference);
    }
}
