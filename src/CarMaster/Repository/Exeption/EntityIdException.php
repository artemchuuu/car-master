<?php

declare(strict_types=1);

namespace CarMaster\Repository\Exeption;

use LogicException;
use Throwable;

class EntityIdException extends LogicException
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}