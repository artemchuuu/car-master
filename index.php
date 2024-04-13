<?php

require_once "CarMaster/Driver.php";
require_once "CarMaster/Car.php";
require_once "CarMaster/Diagnostics.php";
require_once "CarMaster/Company.php";
require_once "CarMaster/Mechanic.php";
require_once "CarMaster/Repair.php";

use CarMaster\Driver;
use CarMaster\Car;
use CarMaster\Diagnostics;
use CarMaster\Company;
use CarMaster\Mechanic;
use CarMaster\Repair;

$company = new Company('CarMaster', 'Broadway Street 1/1', 963391459, 'carmaster@company.com', 'carmaster.com');
echo "\n" . "Назва компанії: " . $company->getName() . "\n";
echo "Адреса: " . $company->getAddress() . "\n";
echo "Номер телефону: " . $company->getPhone() . "\n";
echo "Електронна пошта: " . $company->getEmail() . "\n";
echo "Сайт: " . $company->getWebsite() . "\n\n";

$car_1 = new Car('BMW 3-Series', 'AA0000AA', '30000', 'White', '2020'); // створюємо перший об'єкт авто
$car_2 = new Car('Audi RS7', 'AA7777AA', '15000', 'Silver', '2024');

$driver = new Driver('Mike', 'Smith', 23, 983421579, 'Grow Street 1/4', '3000'); // створюємо нашого першого власника авто
$driver->addCar($car_1);
$driver->addCar($car_2);

echo "\n" . "Ім'я водія: " . $driver->getName() . "\n";
echo "Прізвище: " . $driver->getSurname() . "\n";
echo "Вік: " . $driver->getAge() . "\n";
echo "Адреса: " . $driver->getAddress() . "\n";
echo "Номер телефону: " . $driver->getPhone() . "\n";
echo "Баланс: " . $driver->getBalance() . "\n";

// Тут ми перебираємо масив автівок які є у нашого водія
foreach ($driver->getCars() as $car) {
    echo $car->getModel() . ' - ' . $car->getRelease() . ' - ' . $car->getColor() . "\n";
}

echo "\nDiagnostics: \n\n";

$diagnostics = new Diagnostics();

// діагностуємо, а також тестуємо автівки водія
foreach ($driver->getCars() as $car) {
    $diagnostics->visualInspection($car);
    $diagnostics->testing($car);
}

// Якщо ж ми хочемо продіагностувати саме одру із автівок
//$diagnostics->testing($car_1);
//$diagnostics->visualInspection($car_1);

$diagnostics->updateStatus($car_1, 'Двигун потребує ремонту');

echo "\n\n";

$mechanic = new Mechanic('Dima', '32', '800');

$statuses = $diagnostics->getCarStatuses();
var_dump($statuses);

echo "\n\n";

$repair = new Repair();
$repair->engine($mechanic, $car_1, $diagnostics);

echo "\n\n";

$statuses = $diagnostics->getCarStatuses();
var_dump($statuses);

// Повертаємо вже відремонтовану машину водію