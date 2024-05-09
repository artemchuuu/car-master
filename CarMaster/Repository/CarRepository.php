<?php

declare(strict_types=1);

namespace CarMaster\Repository;

use CarMaster\Car;
use PDO;

readonly class CarRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function add(Car $car): void
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO cars (brand, model, color, stateNumber, mileage, vinCode, releaseDate, owner_id) 
                    VALUES (:brand, :model, :color, :stateNumber, :mileage, :vinCode, :releaseDate)
        ");
        $statement->execute([
            ':brand' => $car->getBrand(),
            ':model' => $car->getModel(),
            ':color' => $car->getColor(),
            ':stateNumber' => $car->getStateNumber(),
            ':mileage' => $car->getMileage(),
            ':vinCode' => $car->getVinCode(),
            ':releaseDate' => $car->getReleaseDate(),
        ]);
        $car->setId((int) $this->pdo->lastInsertId());
    }

    public function delete(Car $car): void
    {
        $statement = $this->pdo->prepare("DELETE FROM cars WHERE id = :id");
        $statement->execute(['vinCode' => $car->getId()]);
    }

    public function getInfo(string $vinCode): void
    {
        $statement = $this->pdo->prepare(
            "SELECT cars.*, carOwners.name, carOwners.surname
                    FROM cars
                    JOIN carOwners ON cars.owner_id = carOwners.id
                    WHERE cars.vinCode = :vinCode
                    GROUP BY cars.id, carOwners.name, carOwners.surname;"
        );
        $statement->execute(['vinCode' => $vinCode]);
    }
}