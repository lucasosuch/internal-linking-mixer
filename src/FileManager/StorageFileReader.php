<?php

namespace InternalLinking\FileManager;

class StorageFileReader implements FileReader
{
    public function read(string $path): array
    {
        $lines = [];
        $file_to_read = fopen($path, 'r');

        while (!feof($file_to_read)) {
            $lines[] = fgetcsv($file_to_read, 1000, ';');
        }

        fclose($file_to_read);

        return $lines;
    }
}
