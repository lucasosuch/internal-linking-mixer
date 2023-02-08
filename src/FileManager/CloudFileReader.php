<?php

namespace InternalLinking\FileManager;

class CloudFileReader implements FileReader
{
    /**
     * @param string $path
     * @param string $separator
     * @return array
     */
    public function read(string $path, string $separator): array
    {
        return [];
    }
}
