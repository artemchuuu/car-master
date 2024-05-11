<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Entity\Car;
use CarMaster\Entity\CarPart;
use CarMaster\Entity\Client;
use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use CarMaster\Entity\Enum\BodyType;
use CarMaster\Entity\Enum\Brand;
use CarMaster\Entity\Enum\ConditionStatus;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use CarMaster\Repository\CarRepository;
use CarMaster\ServiceFactory;

try {
//    $serviceFactory = new ServiceFactory();
//
//    $carRepository = new CarRepository($serviceFactory->create());

    $company = new Company;
    $company->setName('Car Master');
    $company->setEmail('info@carmaster.com');
    $company->setWebsite('carmaster.com');
    $company->setAbout('Car Master is your reliable partner in the world of cars.');

    $employee = new Employee;
    $employee->setName('John');
    $employee->setSurname('Doe');
    $employee->setAge(28);
    $employee->setSalary(3200);
    $employee->setSpecialization('Electrician');
    $employee->setCompany($company);

    $company->addEmployee($employee);

    $car = new Car;
    $car->setBrand(Brand::Audi);
    $car->setModel('RS7');
    $car->setColor('Red');
    $car->setReleaseDate(new DateTime('2022-12-12'));
    $car->setStateNumber('AA0000AA');
    $car->setMileage(10000);
    $car->setVinCode('AASTAK31334000000');
    $car->setBodyType(BodyType::Hatchback);

    $client = new Client;
    $client->setName('Mark');
    $client->setSurname('Smith');
    $client->setAge(25);
    $client->setCars($car);
    $client->setPhoneNumber(380965643);

    $carPart = new CarPart();
    $carPart->setName('Tyres');
    $carPart->setNumber(10123);
    $carPart->setPrice(3497);
    $carPart->setDescription('Summer tyres');
    $carPart->setCondition(ConditionStatus::New);
    $carPart->setAddedDate(new DateTime('2024-05-11'));
    $carPart->setManufacturer('Michelin');

    $car->setClient($client);
    var_dump($car->getFullName());

} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}   catch (VinCodeValidationException $e) {
    echo "Error: incorrect VIN: " . $e;
} catch (NameValidationException $e) {
    echo "A mistake in the name: " . $e;
}