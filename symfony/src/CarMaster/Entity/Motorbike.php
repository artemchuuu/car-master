<?php

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\MotorcycleType;

class Motorbike extends Vehicle
{
    private MotorcycleType $type;

    public function getTypeMoto(): MotorcycleType
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
        $fullInfo['type'] = $this->getTypeMoto()->value;

        return $fullInfo;
    }
}