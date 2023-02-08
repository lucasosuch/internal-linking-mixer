<?php

namespace InternalLinking\FileManager;

class StorageFileReader implements FileReader
{
    /**
     * @param string $path
     * @param string $separator
     * @return array
     */
    public function read(string $path, string $separator): array
    {
        $lines = [];
        $file_to_read = fopen($path, 'r');

        while (!feof($file_to_read)) {
            $lines[] = fgetcsv($file_to_read, 1000, $separator);
        }

        fclose($file_to_read);

        return $lines;
    }
}
