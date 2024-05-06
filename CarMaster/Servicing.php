<?php

declare(strict_types=1);

namespace CarMaster;

class Servicing
{
    private int $id = 1;
    private CarOwner $carOwner;
    private Car $car;
    private Mechanic $employees;
    public function getServicingInfo(): string
    {
        return "Service #{$this->id}  The owner of the car: {$this->carOwner->getName()} Master: {$this->employees->getName()} Auto: {$this->car->getVinCode()}";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCarOwner(): CarOwner
    {
        return $this->carOwner;
    }

    public function setCarOwner(CarOwner $carOwner): void
    {
        $this->carOwner = $carOwner;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    public function getEmployees(): Employees
    {
        return $this->employees;
    }

    public function setEmployees(Employees $employees): void
    {
        $this->employees = $employees;
    }
}