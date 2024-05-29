<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use CarMaster\Database\ExportData;
use CarMaster\Database\TopEmployees;
use Faker\Factory as FakerFactory;
use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use CarMaster\Entity\Exceptions\NameValidationException;
use CarMaster\Entity\Exceptions\VinCodeValidationException;
use CarMaster\ServiceFactory;
use Doctrine\ORM\Exception\ORMException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('client', new Route('/client/{name}', ['name' => 'Client name']));

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

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

//    $entityManager->persist($employee);
//    $entityManager->flush();
//
//    $topEmployees = new TopEmployees();
//    $topEmployees->execute();
//
//    $exportData = new ExportData();
//    $exportData->exportEmployees();

    echo 'hello';

} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}   catch (VinCodeValidationException $e) {
    echo "Error: incorrect VIN: " . $e;
} catch (NameValidationException $e) {
    echo "A mistake in the name: " . $e;
} catch (ORMException $e) {
}