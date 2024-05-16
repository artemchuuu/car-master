<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Database\TopEmployees;
use Faker\Factory as FakerFactory;
use CarMaster\Entity\Car;
use CarMaster\Entity\Client;
use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use CarMaster\Entity\Enum\Brand;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use CarMaster\Repository\VehicleRepository;
use CarMaster\ServiceFactory;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\ORM\Exception\ORMException;

try {

    $faker = FakerFactory::create();

    $serviceFactory = new ServiceFactory();

    $company = new Company();
    $company->setName($faker->company);
    $company->setAbout("The best company");
    $company->setWebsite("https://carmaster.com");
    $company->setEmail("carmaster@carmaster.com");

    $entityManager = $serviceFactory->createORMEntityManager();
    $entityManager->persist($company);

    $employee = new Employee();
    $employee->setName($faker->firstName());
    $employee->setCompany($company);
    $employee->setSpecialization($faker->jobTitle());
    $employee->setSalary($faker->numberBetween($min = 1000, $max = 9000));
    $employee->setSurname($faker->lastName());
    $employee->setAge($faker->numberBetween($min = 18, $max = 59));

    $entityManager->persist($employee);
    $entityManager->flush();

    $topEmployees = new TopEmployees();
    $topEmployees->execute();

} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}   catch (VinCodeValidationException $e) {
    echo "Error: incorrect VIN: " . $e;
} catch (NameValidationException $e) {
    echo "A mistake in the name: " . $e;
} catch (ORMException $e) {
}