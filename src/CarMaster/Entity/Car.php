<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brands;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use DateTime;

class Car
{
    const WIN_CODE_LENGTH = 17;

    private string $model;

    private string $stateNumber;

    private int $mileage;

    private string $color;

    private DateTime $releaseDate;

    private string $vinCode;

    private Brands $brand;

    private array $components;

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setStateNumber(string $stateNumber): void
    {
        $this->stateNumber = $stateNumber;
    }

    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function setVinCode(string $vinCode): void
    {
        $this->validVinCode($vinCode);
        $this->vinCode = $vinCode;
    }

    public function getVinCode(): string
    {
        return $this->vinCode;
    }

    public function getBrand(): Brands
    {
        return $this->brand;
    }

    public function setBrand(Brands $brand): void
    {
        $this->brand = $brand;
    }

    public function validVinCode(string $vinCode): void
    {
        if (strlen($vinCode) !== self::WIN_CODE_LENGTH) {
            throw new VinCodeValidationException('VIN код повинен складатися з 17 символів.');
        }
    }
}