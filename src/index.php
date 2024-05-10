<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Entity\Car;
use CarMaster\Entity\Enum\Brands;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
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
}   catch (VinCodeValidationException $e) {
    echo "Помилка: некорректний VIN: " . $e;
} catch (NameValidationException $e) {
    echo "Помилка в імені: " . $e;
}