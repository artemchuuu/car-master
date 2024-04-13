<?php

namespace CarMaster;

class Car // авто
{
    private string $model; // модель автівки
    private string $number; // державний номер
    private int $mileage; // пробіг
    private string $color; // колір
    private int $release; // дата випуску
    public function __construct(string $model, string $number, int $mileage, string $color, int $release)
    {
        $this->model = $model;
        $this->number = $number;
        $this->mileage = $mileage;
        $this->color = $color;
        $this->release = $release;
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
     * @param int $release
     */
    public function setRelease(int $release): void
    {
        $this->release = $release;
    }

    /**
     * @return int
     */
    public function getRelease(): int
    {
        return $this->release;
    }
}