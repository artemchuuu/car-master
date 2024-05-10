<?php

declare(strict_types=1);

namespace CarMaster\Entity;

class Repair
{
    public function engine(Mechanic $mechanic,Car $car, CarDiagnostic $diagnostics): void
    {
        echo 'Марка: ' . $car->getBrand()->value . ' Модель: ' . $car->getModel() . ' VIN код: ' . $car->getVinCode() . "\n";
        echo $mechanic->startOfTheRepair();
        $diagnostics->updateCarStatus($car, 'Двигун функціонує');
    }
}