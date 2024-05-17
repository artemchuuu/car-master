<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Exceptions\NameValidationException;

class Client
{
    private int $id;

    private string $name;

    private string $surname;

    private int $age;

    private array $vehicles = [];

    private int $phoneNumber;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->validName($name);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return void
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return array
     */
    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    /**
     * @param Vehicle $vehicles
     * @return void
     */
    public function addVehicles(Vehicle $vehicles): void
    {
        $this->vehicles[] = $vehicles;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    /**
     * @param int $phone
     * @return void
     */
    public function setPhoneNumber(int $phone): void
    {
        $this->phoneNumber = $phone;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    /**
     * @return array
     */
    public function getFullInfo(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'age' => $this->age,
            'cars' => $this->vehicles,
            'phoneNumber' => $this->phoneNumber,
        ];
    }

    /**
     * @param string $name
     * @return void
     */
    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('The name is too short.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('The name is too long.');
        }
    }
}