<?php

declare(strict_types=1);

namespace CarMaster;

require_once 'Client.php';

class Owner extends Client // власник автівки
{
    private string $surname; // прізвище
    private int $age; // вік
    private float $balance; // баланс гаманця
    private array $cars = [];

    function __construct(string $name, string $surname, int $age, int $phone, string $address, float $balance)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->phone = $phone;
        $this->address = $address;
        $this->balance = $balance;
    }

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
     * @param int $balance
     */
    public function setBalance(int $balance): void
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