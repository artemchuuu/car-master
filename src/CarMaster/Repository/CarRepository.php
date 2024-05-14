<?php

declare(strict_types=1);

namespace CarMaster\Repository;

use CarMaster\Entity\Car;
use PDO;

readonly class CarRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Car $car): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO cars (brand, model, color, stateNumber, mileage, vinCode, releaseDate) 
                    VALUES (:brand, :model, :color, :stateNumber, :mileage, :vinCode, :releaseDate)
        ");
        $statement->execute([
            ':brand' => $car->getBrand()->value,
            ':model' => $car->getModel(),
            ':color' => $car->getColor(),
            ':stateNumber' => $car->getStateNumber(),
            ':mileage' => $car->getMileage(),
            ':vinCode' => $car->getVinCode(),
            ':releaseDate' => $car->getReleaseDate()->format('Y-m-d'),
        ]);
    }

    public function delete(Car $car): void
    {
        $statement = $this->pdo->prepare("DELETE FROM cars WHERE vinCode = :vinCode");
        $statement->execute(['vinCode' => $car->getVinCode()]);
    }

    public function getInfo(string $vinCode): void
    {
        $statement = $this->pdo->prepare(
            "select cars.id, cars.brand, cars.model, cars.color, cars.stateNumber, cars.mileage, cars.vinCode, cars.releaseDate, carOwners.name, carOwners.surname
from cars
         join carOwners on cars.owner_id = carOwners.id
where cars.vinCode = :vinCode;"
        );
        $statement->execute(['vinCode' => $vinCode]);
    }
}