<?php

declare(strict_types = 1);

namespace CarMaster\Exceptions;

use RuntimeException;

class VinCodeValidationException extends RuntimeException
{
    public function __construct(string $vinCode)
    {
        parent::__construct($vinCode);
    }
}