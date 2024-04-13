<?php

namespace CarMaster;

require_once "Mechanic.php";
require_once "Car.php";
require_once "Diagnostics.php";

class Repair // ремонт
{
    // ремонт двигуна
    public function engine(Mechanic $mechanic,Car $car, Diagnostics $diagnostics): void
    {
        echo $car->getModel() . "\n";
        echo $mechanic->startOfTheRepair();
        $diagnostics->updateStatus($car, 'Двигун функціонує');
    }
}