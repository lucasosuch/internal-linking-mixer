<?php

namespace InternalLinking\Exceptions;

use Exception;

class TextTransformStrategyNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('Text transform strategy not found');
    }
}
