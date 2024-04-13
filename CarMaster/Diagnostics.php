<?php

namespace CarMaster;

class Diagnostics // диагностика
{
    private array $carStatuses = [];
    // візуальна діаностика
    public function visualInspection($car): void
    {
        echo 'Візуальна діагностика автомобіля ' . $car->getModel() . ' ' . $car->getRelease() . ' ' . $car->getNumber() . ":\n" . "- Перевірка кузова\n" . "- Перевірка коліс\n" . "- Перевірка фар\n";
    }
    // тестування автівки
    public function testing($car): void {
        echo 'Тестування автомобіля ' . $car->getModel() . ' ' . $car->getRelease() . ' ' . $car->getNumber() . ":\n" . "- Тестування електричної системи\n" . "- Тестування гальмування\n";
    }
    public function updateStatus($car, $status): void {
        $carKey = $car->getModel() . ' ' . $car->getRelease();
        $this->carStatuses[$carKey] = $status;
    }
    public function getCarStatuses(): array
    {
        return $this->carStatuses;
    }
}