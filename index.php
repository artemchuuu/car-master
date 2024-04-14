<?php

declare(strict_types=1);

require_once "CarMaster/Owner.php";
require_once "CarMaster/Car.php";
require_once "CarMaster/Diagnostics.php";
require_once "CarMaster/OwnerCompany.php";
require_once "CarMaster/Mechanic.php";
require_once "CarMaster/Repair.php";

use CarMaster\Owner;
use CarMaster\Car;
use CarMaster\Diagnostics;
use CarMaster\OwnerCompany;
use CarMaster\Mechanic;
use CarMaster\Repair;

$company = new OwnerCompany('CarMaster', 'Broadway Street 1/1', 963391459, 'carmaster@company.com', 'carmaster.com');

echo "\n** Дані компанії **\n\n";

echo "\n" . "Назва компанії: " . $company->getName() . "\n";
echo "Адреса: " . $company->getAddress() . "\n";
echo "Номер телефону: " . $company->getPhone() . "\n";
echo "Електронна пошта: " . $company->getEmail() . "\n";
echo "Сайт: " . $company->getWebsite() . "\n\n";

$car_1 = new Car('BMW 3-Series', 'AA0000AA', 30000, 'White', "2020-3-4", "1FTEX1CP3JFA13968"); // створюємо перший об'єкт авто
$car_2 = new Car('Audi RS7', 'AA7777AA', 15000, 'Silver', "2024-6-3" , "2GDRX4CH5HSF14534");

//$car_1->setReleaseDate(new DateTime('2007-03-17')); для зміни дати випуску

$owner = new Owner('Mike', 'Smith', 23, 983421579, 'Grow Street 1/4', 2999.99); // створюємо нашого першого власника авто
$owner->addCar($car_1);
$owner->addCar($car_2);

echo "\n** Дані власника автомобіля **\n\n";

echo "\n" . "Ім'я водія: " . $owner->getName() . "\n";
echo "Прізвище: " . $owner->getSurname() . "\n";
echo "Вік: " . $owner->getAge() . "\n";
echo "Адреса: " . $owner->getAddress() . "\n";
echo "Номер телефону: " . $owner->getPhone() . "\n";
echo "Баланс: " . $owner->getBalance() . "\n";

// Тут ми перебираємо масив автівок які є у нашого водія
//foreach ($driver->getCars() as $car) {
//    echo $car->getModel() . ' - ' . $car->getReleaseDate() . ' - ' . $car->getColor() . "\n";
//}

$mechanic = new Mechanic('Dima', 32, 999.99);

echo "\n** Дані механіка **\n\n";

echo "\n" . "Ім'я механіка: " . $mechanic->getName() . "\n";
echo "Вік: " . $mechanic->getAge() . "\n";
echo "Зарплата: " . $mechanic->getSalary() . "\n";

echo "\n** Діагностика **\n\n";

$diagnostics = new Diagnostics();

// Проводимо діагностику усіх авсо які є у власника
foreach ($owner->getCars() as $car) {
    $diagnostics->visualInspection($car);
    $diagnostics->testing($car);
}

// Якщо ж ми хочемо продіагностувати саме одру із автівок
//$diagnostics->testing($car_1);
//$diagnostics->visualInspection($car_1);


// Після діагностиви виявляється проблема
$diagnostics->updateStatus($car_1, 'Двигун потребує ремонту');

echo "\n\n";

$statuses = $diagnostics->getCarStatuses();
var_dump($statuses);

echo "\n\n";

echo "\n** Процес ремонту двигуна **\n\n";

$repair = new Repair();
$repair->engine($mechanic, $car_1, $diagnostics);

echo "\n\n";

$statuses = $diagnostics->getCarStatuses();
var_dump($statuses);

// Повертаємо вже відремонтовану машину водію