<?php

declare(strict_types = 1);

namespace CarMaster\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class UpdateCar
{
    public function __construct(
        #[Assert\Length(min: 1, max: 255)]
        public ?string $brand = null,

        #[Assert\Length(min: 1, max: 255)]
        public ?string $model = null,

        #[Assert\Length(max: 17)]
        public ?string $vinCode = null
    ) {
    }
}