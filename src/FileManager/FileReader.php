<?php

namespace InternalLinking\FileManager;

interface FileReader
{
    public function read(string $path): array;
}
