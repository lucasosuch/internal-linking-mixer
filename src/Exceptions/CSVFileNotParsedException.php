<?php

namespace InternalLinking\Exceptions;

use Exception;

class CSVFileNotParsedException extends Exception
{
    public function __construct()
    {
        parent::__construct('CSV file not parsed');
    }
}
