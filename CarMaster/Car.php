<?php

declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\VinCodeValidationException;
use DateTime;

class Car
{
    private string $model;
    private string $stateNumber;
    private int $mileage;
    private string $color;
    private DateTime $releaseDate;
    private string $vinCode;
    private Brand $brand;

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $stateNumber
     */
    public function setNumber(string $stateNumber): void
    {
        $this->stateNumber = $stateNumber;
    }

    /**
     * @return string
     */
    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    /**
     * @param int $mileage
     */
    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    /**
     * @return int
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime $releaseDate
     */
    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @param string $vinCode
     */
    public function setVinCode(string $vinCode): void
    {
        $this->validVinCode($vinCode);
        $this->vinCode = $vinCode;
    }

    /**
     * @return string
     */
    public function getVinCode(): string
    {
        return $this->vinCode;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return void
     */
    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param string $vinCode
     * @return void
     */
    public function validVinCode(string $vinCode): void
    {
        if (strlen($vinCode) != 17 ) {
            throw new VinCodeValidationException('VIN код повинен складатися з 17 символів.');
        }
    }
}