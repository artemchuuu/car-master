<?php

declare(strict_types=1);

namespace CarMaster;

use DateTime;
use Exception;

class Car // авто
{
    private string $model; // модель автівки
    private string $number; // державний номер
    private int $mileage; // пробіг
    private string $color; // колір
    private DateTime $releaseDate;
    private string $vinCode;

    /**
     * @throws Exception
     */
    public function __construct(string $model, string $number, int $mileage, string $color, $releaseDate, string $vinCode)
    {
        $this->model = $model;
        $this->number = $number;
        $this->mileage = $mileage;
        $this->color = $color;
        $this->releaseDate = new DateTime($releaseDate);
        $this->vinCode = $vinCode;
    }

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
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
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
        $this->vinCode = $vinCode;
    }

    /**
     * @return string
     */
    public function getVinCode(): string
    {
        return $this->vinCode;
    }
}