<?php

namespace InternalLinking\Exceptions;

class FileReaderNotFoundException extends \Exception
{
    public function __construct(string $fileReaderType)
    {
        parent::__construct("FileReaderType {$fileReaderType} not found");
    }
}
