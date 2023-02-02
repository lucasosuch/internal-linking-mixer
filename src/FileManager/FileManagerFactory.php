<?php

namespace InternalLinking\FileManager;

use InternalLinking\Exceptions\FileReaderNotFoundException;

final class FileManagerFactory
{
    /**
     * @param string $fileReader
     * @return FileReader
     * @throws FileReaderNotFoundException
     */
    public function create(string $fileReader): FileReader
    {
        switch($fileReader) {
            case FileReaderType::STORAGE:
                return new StorageFileReader();
            case FileReaderType::CLOUD:
                return new CloudFileReader();
            default:
                throw new FileReaderNotFoundException($fileReader);
        }
    }
}
