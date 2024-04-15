<?php

declare(strict_types=1);

namespace CarMaster;

class Diagnostics // диагностика
{
    private array $carStatuses = [];
    // візуальна діаностика
    public function visualInspection(Car $car): void
    {
        echo 'Візуальна діагностика автомобіля ' . $car->getModel() . ' VIN: ' . $car->getVinCode() . ":\n" . "- Перевірка кузова\n" . "- Перевірка коліс\n" . "- Перевірка фар\n";
    }
    // тестування автівки
    public function testing(Car $car): void {
        echo 'Тестування автомобіля ' . $car->getModel() . ' VIN: ' . $car->getVinCode() . ":\n" . "- Тестування електричної системи\n" . "- Тестування гальмування\n";
    }
    public function updateStatus(Car $car,string $status): void {
        $carKey = $car->getVinCode();
        $this->carStatuses[$carKey] = $status;
    }
    public function getCarStatuses(): array
    {
        return $this->carStatuses;
    }
}