<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brands;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use DateTime;

class Car extends Vehicle
{
    const WIN_CODE_LENGTH = 17;

    private string $stateNumber;

    private int $mileage;

    private string $color;

    private DateTime $releaseDate;

    private string $vinCode;

    private Client $client;

    public function getBrand(): Brands
    {
        return $this->brand;
    }

    public function setBrand(Brands $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    public function setStateNumber(string $stateNumber): void
    {
        $this->stateNumber = $stateNumber;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getVinCode(): string
    {
        return $this->vinCode;
    }

    public function setVinCode(string $vinCode): void
    {
        $this->vinCode = $vinCode;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function validVinCode(string $vinCode): void
    {
        if (strlen($vinCode) !== self::WIN_CODE_LENGTH) {
            throw new VinCodeValidationException('VIN код повинен складатися з 17 символів.');
        }
    }
}