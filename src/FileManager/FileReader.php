<?php

namespace InternalLinking\FileManager;

interface FileReader
{
    public function read(string $path, string $separator): array;
}
