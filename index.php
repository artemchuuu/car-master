<?php

declare(strict_types=1);

require_once "autoload.php";

use CarMaster\Exceptions\VinCodeValidationException;
use CarMaster\Exceptions\NameValidationException;
use CarMaster\Owner;
use CarMaster\Car;
use CarMaster\Diagnostics;
use CarMaster\OwnerCompany;
use CarMaster\Mechanic;
use CarMaster\Repair;
use CarMaster\Brand;

try {
    $company = new OwnerCompany();
    $company->setName('CarMaster');
    $company->setAddress('Broadway Street 1/1');
    $company->setPhone(963391459);
    $company->setEmail('carmaster@company.com');
    $company->setWebsite('car-master.com');

    $car_1 = new Car();
    $car_1->setBrand(Brand::Toyota);
    $car_1->setModel('RAV4');
    $car_1->setNumber('AA0000AA');
    $car_1->setMileage(1000);
    $car_1->setColor('White');
    $car_1->setVinCode('2334GSD43SER527GA');
    $car_1->setReleaseDate(new DateTime('2022-03-17'));

    $car_2 = new Car();
    $car_2->setBrand(Brand::Renault);
    $car_2->setModel('Duster');
    $car_2->setNumber('AA7777AA');
    $car_2->setMileage(1000);
    $car_2->setColor('Black');
    $car_2->setVinCode('342FGJAL34FQWPJ32');
    $car_2->setReleaseDate(new DateTime('2020-03-17'));

    $owner = new Owner();
    $owner->setName('Mike');
    $owner->setSurname('Smith');
    $owner->setAge(23);
    $owner->setPhone(983421579);
    $owner->setBalance(2389.49);
    $owner->setAddress('Primorska 1/F');
    $owner->addCar($car_1);
    $owner->addCar($car_2);

    $mechanic = new Mechanic();
    $mechanic->setName('John');
    $mechanic->setSurname('Elton');
    $mechanic->setAge(32);
    $mechanic->setSalary(999.99);

    $diagnostics = new Diagnostics();

    echo "\n\n================================================\n\n";

    echo 'Назва компанії: ' . $company->getName() . "\n";
    echo 'Адреса: ' . $company->getAddress() . "\n";
    echo 'Телефон: ' . $company->getPhone() . "\n";
    echo 'Ел. пошта: ' . $company->getEmail() . "\n";
    echo 'Сайт: ' . $company->getWebsite() . "\n\n";

    echo "\n\n================================================\n\n";

    echo 'Ім\'я власника: ' . $owner->getName() . "\n";
    echo 'Прізвище: ' . $owner->getSurname() . "\n";
    echo 'Вік: ' . $owner->getAge() . "\n";
    echo 'Адреса: ' . $owner->getAddress() . "\n";
    echo 'Телефон: ' . $owner->getPhone() . "\n";
    echo 'Баланс гаманця: ' . $owner->getBalance() . "\n";
    echo 'Автівки власника: ' . "\n";

    foreach ($owner->getCars() as $car) {
        echo $car->getBrand()->value . ' ' . $car->getModel() . ' ' . $car->getVinCode() . "\n";
    }

    echo "\n\n================================================\n\n";

    echo 'Ім\'я механіка: ' . $mechanic->getName() . "\n";
    echo 'Прізвище: ' . $mechanic->getSurname() . "\n";
    echo 'Вік: ' . $mechanic->getAge() . "\n";
    echo 'Зарплата: ' . $mechanic->getSalary() . "\n";

    echo "\n\n================================================\n\n";

    foreach ($owner->getCars() as $car) {
        $diagnostics->visualInspection($car);
        $diagnostics->testingCar($car);
    }

    $diagnostics->updateCarStatus($car_1, 'Двигун потребує ремонту');

    echo "\n\n================================================\n\n";

    $carStatuses = $diagnostics->getCarStatuses();
    var_dump($carStatuses);

    echo "\n\n================================================\n\n";

    echo "\n** Процес ремонту двигуна **\n\n";
    $repair = new Repair();
    $repair->engine($mechanic, $car_1, $diagnostics);

    echo "\n\n================================================\n\n";

    $carStatuses = $diagnostics->getCarStatuses();
    var_dump($carStatuses);

} catch (VinCodeValidationException $e) {
    echo "Помилка: некорректний VIN: " . $e;
} catch (NameValidationException $e) {
    echo "Помилка в імені: " . $e;
}