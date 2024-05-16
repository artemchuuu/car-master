<?php

declare(strict_types=1);

namespace CarMaster\Repository;

use CarMaster\Entity\Vehicle;
use CarMaster\Repository\Exeption\EntityIdException;
use PDO;

readonly class VehicleRepository
{
    public function  __construct(private PDO $pdo)
    {
    }

    public function add(Vehicle $vehicle): void
    {
        if (null == $vehicle->getId()) {
            throw new EntityIdException();
        }

        $statement = $this->pdo->prepare("
        INSERT INTO vehicle('brand', 'model', 'color', 'release_date', 'state_number', 'mileage', 'type', 'vin_code', 'client_id')
            VALUES (:brand, :model, :color, :release_date, :state_number, :mileage, :type, :vin_code, :client_id)");

        $statement->execute([
            ':brand' => $vehicle->getBrand(),
            ':model' => $vehicle->getModel(),
            ':color' => $vehicle->getColor(),
            ':release_date' => $vehicle->getReleaseDate(),
            ':state_number' => $vehicle->getStateNumber(),
            ':mileage' => $vehicle->getMileage(),
            ':type' => $vehicle->getType(),
            ':vin_code' => $vehicle->getVinCode(),
            ':client_id' => $vehicle->getClient()->getId()
        ]);

        $vehicle->setId((int)$this->pdo->lastInsertId());
    }

}