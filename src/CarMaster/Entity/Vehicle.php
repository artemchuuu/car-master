<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brands;

abstract class Vehicle
{
    protected Brands $brand;

    protected string $model;
}