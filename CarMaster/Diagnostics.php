<?php

declare(strict_types=1);

namespace CarMaster;

class Diagnostics
{
    private array $carStatuses = [];

    /**
     * @param Car $car
     * @return void
     */
    public function visualInspection(Car $car): void
    {
        echo '*Візуальна діагностика* ' . ' Марка: ' . $car->getBrand()->value . ' Model: ' . $car->getModel() . ' VIN код: ' . $car->getVinCode() . ":\n" . "- Перевірка кузова\n" . "- Перевірка коліс\n" . "- Перевірка фар\n";
    }

    /**
     * @param Car $car
     * @return void
     */
    public function testingCar(Car $car): void {
        echo '*Тестування* ' . ' Марка: ' . $car->getBrand()->value . ' Model: ' . $car->getModel() . ' VIN код: ' . $car->getVinCode() . ":\n" . "- Тестування електричної системи\n" . "- Тестування гальмування\n";
    }

    /**
     * @param Car $car
     * @param string $status
     * @return void
     */
    public function updateCarStatus(Car $car,string $status): void {
        $carKey = $car->getVinCode();
        $this->carStatuses[$carKey] = $status;
    }

    /**
     * @return array
     */
    public function getCarStatuses(): array
    {
        return $this->carStatuses;
    }
}