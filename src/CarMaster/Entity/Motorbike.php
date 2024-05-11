<?php

namespace CarMaster\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use CarMaster\Entity\Enum\MotorcycleType;

#[Entity]
class Motorbike extends Vehicle
{
    #[Column(type: Types::STRING, length: 55)]
    private MotorcycleType $type;

    public function getType(): MotorcycleType
    {
        return $this->type;
    }

    public function setType(MotorcycleType $type): void
    {
        $this->type = $type;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo['type'] = $this->getType()->value;

        return $fullInfo;
    }
}