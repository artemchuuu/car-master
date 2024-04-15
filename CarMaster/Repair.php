<?php

declare(strict_types=1);

namespace CarMaster;

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