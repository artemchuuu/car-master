<?php

declare(strict_types = 1);

namespace CarMaster\Entity\Exceptions;

use RuntimeException;

class VinCodeValidationException extends RuntimeException
{
    public function __construct(string $vinCode)
    {
        parent::__construct($vinCode);
    }
}