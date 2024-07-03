<?php

declare(strict_types=1);

namespace CarMaster\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateCar
{
    public function __construct(
        #[Assert\Positive]
        public int $clientId,

        #[Assert\Length(min: 1, max: 255)]
        public string $brand,

        #[Assert\Length(min: 1, max: 255)]
        public string $model,

        #[Assert\Length(max: 17)]
        public string $vinCode
    ) {
    }
}