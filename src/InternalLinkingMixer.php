<?php

namespace InternalLinking;

use InternalLinking\Exceptions\CSVFileNotParsedException;
use InternalLinking\Exceptions\FileReaderNotFoundException;
use InternalLinking\Exceptions\TextTransformStrategyNotFoundException;
use InternalLinking\FileManager\FileManagerFactory;
use InternalLinking\FileManager\FileReaderType;
use InternalLinking\Generator\TextTransformPreference;
use InternalLinking\Generator\TextWithInternalLinkingGenerator;

class InternalLinkingMixer
{
    private array $parsedCVSFile = [];
    private array $transformedParsedCVSFile = [];
    private FileManagerFactory $fileManagerFactory;

    public function __construct()
    {
        $this->fileManagerFactory = new FileManagerFactory();
    }

    /**
     * @param string $filePath
     * @param string $separator
     * @return $this
     * @throws FileReaderNotFoundException
     */
    public function parseStorageFile(string $filePath, string $separator): InternalLinkingMixer
    {
        $this->parsedCVSFile = $this->fileManagerFactory->create(FileReaderType::STORAGE)->read($filePath, $separator);
        return $this;
    }

    /**
     * @param string $filePath
     * @param string $separator
     * @return $this
     * @throws FileReaderNotFoundException
     */
    public function parseCloudFile(string $filePath, string $separator): InternalLinkingMixer
    {
        $this->parsedCVSFile = $this->fileManagerFactory->create(FileReaderType::CLOUD)->read($filePath, $separator);
        return $this;
    }

    /**
     * @param bool $returnAsArray
     * @return InternalLinkingMixer
     * @throws CSVFileNotParsedException
     * @throws TextTransformStrategyNotFoundException
     */
    public function generate(bool $returnAsArray = true): InternalLinkingMixer
    {
        if (empty($this->parsedCVSFile)) {
            throw new CSVFileNotParsedException();
        }

        $textTransformPreference = new TextTransformPreference($returnAsArray);
        $textWithInternalLinkingGenerator = new TextWithInternalLinkingGenerator();

        $textWithInternalLinkingGenerator->transformText($this->getParsedCVSFile(), $textTransformPreference);

        if ($returnAsArray) {
            $this->transformedParsedCVSFile = $textWithInternalLinkingGenerator->getTransformedTextAsArray();
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getParsedCVSFile(): array
    {
        return $this->parsedCVSFile;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->transformedParsedCVSFile;
    }
}
