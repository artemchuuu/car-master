<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Exceptions\NameValidationException;

class Client
{
    protected string $name;

    private string $surname;

    private int $age;

    protected int $phone;

    protected string $address;

    private array $cars;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->validName($name);
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function addCar($cars): void
    {
        $this->cars = $cars;
    }

    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('Занадто коротке ім\'я.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('Занадто довге ім\'я.');
        }
    }
}