<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Entity\Brands;
use CarMaster\Entity\Car;
use CarMaster\Entity\CarDiagnostic;
use CarMaster\Entity\CarOwner;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use CarMaster\Entity\Mechanic;
use CarMaster\Entity\OwnerCompany;
use CarMaster\Entity\Repair;
use CarMaster\Entity\Servicing;
use CarMaster\Repository\CarRepository;
use CarMaster\ServiceFactory;

try {
    $serviceFactory = new ServiceFactory();

    $car3 = new Car();
    $car3->setBrand(Brands::Audi);
    $car3->setModel('RS7');
    $car3->setStateNumber('AA1111AA');
    $car3->setMileage(1000);
    $car3->setColor('Black');
    $car3->setVinCode('1GCHK24K79E193794');
    $car3->setReleaseDate(new DateTime('2020-08-01'));

    $carRepository = new CarRepository($serviceFactory->create());
    $carRepository->add($car3);
//    $carRepository->delete($car3);

} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}

try {
    $company = new OwnerCompany();
    $company->setName('CarMaster');
    $company->setAddress(Faker\Factory::create()->address());
    $company->setPhone(963391459);
    $company->setEmail('carmaster@company.com');
    $company->setWebsite('car-master.com');

    $car1 = new Car();
    $car1->setId(2);
    $car1->setBrand(Brands::Toyota);
    $car1->setModel('RAV4');
    $car1->setStateNumber('AA0000AA');
    $car1->setMileage(1000);
    $car1->setColor('White');
    $car1->setVinCode('2GKALMEK9FJ202605');
    $car1->setReleaseDate(new DateTime('2022-03-17'));

    $car2 = new Car();
    $car2->setBrand(Brands::Renault);
    $car2->setModel('Duster');
    $car2->setStateNumber('AA7777AA');
    $car2->setMileage(1000);
    $car2->setColor('Black');
    $car2->setVinCode('342FGJAL34FQWPJ32');
    $car2->setReleaseDate(new DateTime('2020-03-17'));

    $car3 = new Car();
    $car3->setBrand(Brands::Audi);
    $car3->setModel('RS7');
    $car3->setStateNumber('AA1111AA');
    $car3->setMileage(1000);
    $car3->setColor('Black');
    $car3->setVinCode('41FW35AQ34FQWPJ32');
    $car3->setReleaseDate(new DateTime('2020-08-01'));

    $owner = new CarOwner();
    $owner->setName(Faker\Factory::create()->firstName());
    $owner->setSurname(Faker\Factory::create()->lastName());
    $owner->setAge(23);
    $owner->setPhone(983421579);
    $owner->setBalance(2389.49);
    $owner->setAddress(Faker\Factory::create()->address());
    $owner->addCar($car1);
    $owner->addCar($car2);

    $mechanic = new Mechanic();
    $mechanic->setName(Faker\Factory::create()->firstName());
    $mechanic->setSurname(Faker\Factory::create()->lastName());
    $mechanic->setAge(32);
    $mechanic->setSalary(999.99);

    $carDiagnostic = new CarDiagnostic();

    $servicing = new Servicing();
    $servicing->setCarOwner($owner);
    $servicing->setCar($car1);
    $servicing->setEmployees($mechanic);
    $servicing->setId(3);

    echo 'Назва компанії: ' . $company->getName() . "\n";
    echo 'Адреса: ' . $company->getAddress() . "\n";
    echo 'Телефон: ' . $company->getPhone() . "\n";
    echo 'Ел. пошта: ' . $company->getEmail() . "\n";
    echo 'Сайт: ' . $company->getWebsite() . "\n";

    echo "\n\n";

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

    echo "\n\n";

    echo 'Ім\'я механіка: ' . $mechanic->getName() . "\n";
    echo 'Прізвище: ' . $mechanic->getSurname() . "\n";
    echo 'Вік: ' . $mechanic->getAge() . "\n";
    echo 'Зарплата: ' . $mechanic->getSalary() . "\n";

    echo "\n\n";

    foreach ($owner->getCars() as $car) {
        $carDiagnostic->visualInspection($car);
        $carDiagnostic->testing($car);
    }

    $carDiagnostic->updateCarStatus($car1, 'Двигун потребує ремонту');

    echo "Заключення: " . $carDiagnostic->getCarStatus() . "\n\n";

    echo "\n** Процес ремонту двигуна **\n\n";
    $repair = new Repair();
    $repair->engine($mechanic, $car1, $carDiagnostic);

    echo "\n\n";

    echo $servicing->getServicingInfo();

    echo "\n\n";

    echo $carDiagnostic->getCarStatus();

    echo "\n\n";

} catch (VinCodeValidationException $e) {
    echo "Помилка: некорректний VIN: " . $e;
} catch (NameValidationException $e) {
    echo "Помилка в імені: " . $e;
}