<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\BodyType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

class Car extends Vehicle
{
    private BodyType $bodyType;

    public function getBodyType(): BodyType
    {
        return $this->bodyType;
    }

    public function setBodyType(BodyType $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    public function getFullName(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo['BodyType'] = $this->getBodyType()->value;

        return $fullInfo;
    }
}