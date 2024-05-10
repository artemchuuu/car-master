<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use DateTime;

class CarPart
{
    private string $name;

    private string $number;

    private float $price;

    private string $description;

    private string $condition;

    private DateTime $addedDate;

    private string $manufacturer;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
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

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): void
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
}