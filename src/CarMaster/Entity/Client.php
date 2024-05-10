<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Exceptions\NameValidationException;

class Client
{
    private string $name;

    private string $surname;

    private int $age;

    private array $cars;

    private int $phoneNumber;

    public function setName(string $name): void
    {
        $this->validName($name);
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
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

    public function getCars(): array
    {
        return $this->cars;
    }

    public function setCars(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phone): void
    {
        $this->phoneNumber = $phone;
    }

    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('The name is too short.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('The name is too long.');
        }
    }
}