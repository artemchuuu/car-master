<?php

declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\NameValidationException;

class Employees
{
    protected string $name;
    protected string $surname;
    protected int $age;
    protected float $salary;

    /**
     * @return void
     */
    public function startOfTheRepair(): void
    {
        echo "*Починається робота*\n";
    }

    /**
     * @param string $name
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
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
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