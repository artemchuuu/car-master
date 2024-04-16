<?php

declare(strict_types=1);

namespace CarMaster;

class Owner extends Client
{
    private string $surname;
    private int $age;
    private float $balance;
    private array $cars = [];

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param float $balance
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param Car $car
     * @return void
     */
    public function addCar(Car $car): void
    {
        $this->cars[] = $car;
    }

    /**
     * @return array
     */
    public function getCars(): array
    {
        return $this->cars;
    }
}