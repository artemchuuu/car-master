<?php

declare(strict_types=1);

namespace CarMaster;

class CarDiagnostic
{
    private array $carStatus = [];

    public function visualInspection(Car $car): void
    {
        echo '*Візуальна діагностика* ' . ' Марка: ' . $car->getBrand()->value . ' Model: ' . $car->getModel() . ' VIN код: ' . $car->getVinCode() . ":\n" . "- Перевірка кузова\n" . "- Перевірка коліс\n" . "- Перевірка фар\n";
    }

    public function testing(Car $car): void {
        echo '*Тестування* ' . ' Марка: ' . $car->getBrand()->value . ' Model: ' . $car->getModel() . ' VIN код: ' . $car->getVinCode() . ":\n" . "- Тестування електричної системи\n" . "- Тестування гальмування\n";
    }

    public function updateCarStatus(Car $car,string $status): void {
        $carKey = $car->getVinCode();
        $this->carStatus[$carKey] = $status;
    }

    public function getCarStatus(): string
    {
        $carStatus = '';
        foreach ($this->carStatus as $vinCode => $status) {
            $carStatus .= $vinCode . ":" . $status . "\n";
        }
        return $carStatus;
    }
}