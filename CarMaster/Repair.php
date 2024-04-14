<?php

declare(strict_types=1);

namespace CarMaster;

require_once "Mechanic.php";
require_once "Car.php";
require_once "Diagnostics.php";

class Repair // ремонт
{
    // ремонт двигуна
    public function engine(Mechanic $mechanic,Car $car, Diagnostics $diagnostics): void
    {
        echo "VIN code: " . $car->getVinCode() . "\n";
        echo $mechanic->startOfTheRepair();
        $diagnostics->updateStatus($car, 'Двигун функціонує');
    }
}