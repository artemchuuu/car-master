<?php

namespace CarMaster;

class Employees // співробітник
{
    protected string $name; // ім'я співробітника
    protected int $age; // вік
    protected int $salary; // зарплата

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
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }
}