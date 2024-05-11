<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\ConditionStatus;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "car_part")]
class CarPart
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(type: Types::STRING, length: 255)]
    private string $name;

    #[Column(type: Types::INTEGER)]
    private int $number;

    #[Column(type: Types::INTEGER)]
    private float $price;

    #[Column(type: Types::STRING)]
    private string $description;

    #[Column(type: Types::STRING, length: 150)]
    private ConditionStatus $condition;

    #[Column(type: Types::DATE_MUTABLE)]
    private DateTime $addedDate;

    #[Column(type: Types::STRING, length: 150)]
    private string $manufacturer;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCondition(): ConditionStatus
    {
        return $this->condition;
    }

    public function setCondition(ConditionStatus $condition): void
    {
        $this->condition = $condition;
    }

    public function getAddedDate(): DateTime
    {
        return $this->addedDate;
    }

    public function setAddedDate(DateTime $addedDate): void
    {
        $this->addedDate = $addedDate;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getFullInfo(): array
    {
        return [
            "name" => $this->name,
            "number" => $this->number,
            "price" => $this->price,
            "description" => $this->description,
            "condition" => $this->condition->value,
            "addedDate" => $this->addedDate->format("Y-m-d"),
            "manufacturer" => $this->manufacturer,
        ];
    }
}