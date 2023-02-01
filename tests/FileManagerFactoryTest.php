<?php

use InternalLinking\Exceptions\FileReaderNotFoundException;
use InternalLinking\FileManager\CloudFileReader;
use InternalLinking\FileManager\FileManagerFactory;
use InternalLinking\FileManager\FileReader;
use InternalLinking\FileManager\FileReaderType;
use InternalLinking\FileManager\StorageFileReader;
use PHPUnit\Framework\TestCase;

final class FileManagerFactoryTest extends TestCase
{
    /**
     * @return void
     * @throws FileReaderNotFoundException
     */
    public function testCanCreateStorageFileReader(): void
    {
        $fileReader = (new FileManagerFactory())->create(FileReaderType::STORAGE);

        self::assertInstanceOf(FileReader::class, $fileReader);
        self::assertInstanceOf(StorageFileReader::class, $fileReader);
    }

    /**
     * @return void
     * @throws FileReaderNotFoundException
     */
    public function testCanCreateCloudFileReader(): void
    {
        $fileReader = (new FileManagerFactory())->create(FileReaderType::CLOUD);

        self::assertInstanceOf(FileReader::class, $fileReader);
        self::assertInstanceOf(CloudFileReader::class, $fileReader);
    }
}
