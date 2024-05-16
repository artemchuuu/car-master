<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Entity\Car;
use CarMaster\Entity\Client;
use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use CarMaster\Entity\Enum\Brand;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use CarMaster\Repository\VehicleRepository;
use CarMaster\ServiceFactory;
use Doctrine\ORM\Exception\ORMException;

try {

    $serviceFactory = new ServiceFactory();

    $company = new Company();
    $company->setName("Car Master");
    $company->setAbout("The best company");
    $company->setWebsite("https://carmaster.com");
    $company->setEmail("carmaster@carmaster.com");

    $entityManager = $serviceFactory->createORMEntityManager();
    $entityManager->persist($company);

    $employee = new Employee();
    $employee->setName("Carl");
    $employee->setCompany($company);
    $employee->setSpecialization("Mechanical Engineer");
    $employee->setSalary(9000);
    $employee->setSurname("King");

    $entityManager->persist($employee);
    $entityManager->flush();

} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}   catch (VinCodeValidationException $e) {
    echo "Error: incorrect VIN: " . $e;
} catch (NameValidationException $e) {
    echo "A mistake in the name: " . $e;
} catch (ORMException $e) {
}