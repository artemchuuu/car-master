<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\BodyType;

class Car extends Vehicle
{
    private BodyType $bodyType;

    /**
     * @return BodyType
     */
    public function getBodyType(): BodyType
    {
        return $this->bodyType;
    }

    /**
     * @param BodyType $bodyType
     * @return void
     */
    public function setBodyType(BodyType $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    /**
     * @return array
     */
    public function getFullName(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo['BodyType'] = $this->getBodyType()->value;

        return $fullInfo;
    }
}