<?php

namespace App\Controller;

use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeeController extends AbstractController
{
    #[Route('/employee/{id}', name: 'app_employee')]
    public function index(string $id, EntityManagerInterface $entityManager): Response
    {
        $employee = $entityManager->getRepository(Employee::class)->find($id);

        return new JsonResponse($employee->getFullInfo());
    }

    #[Route('/employee/{firstName}/{lastName}', name: 'app_employee_create')]
    public function  create(string $firstName, string $lastName, EntityManagerInterface $entityManager): Response
    {
        $faker = Factory::create();

        $company = new Company();
        $company->setName($faker->company());
        $company->setAbout($faker->text());
        $company->setEmail($faker->email());

        $entityManager->persist($company);

        $employee = new Employee();
        $employee->setName($firstName);
        $employee->setSurname($lastName);
        $employee->setAge($faker->numberBetween(18, 50));
        $employee->setSalary($faker->numberBetween(300, 1000));
        $employee->setSpecialization($faker->jobTitle());
        $employee->setCompany($company);

        $entityManager->persist($employee);
        $entityManager->flush();

        return new JsonResponse($employee->getFullInfo());
    }

    #[Route('/high-salary/{count}', name: 'app_employee_high_salary')]
    public function findEmployeesWithHighestSalary(string $count, EntityManagerInterface $entityManager): Response
    {
        $queryBuilder = $entityManager
            ->getRepository(Employee::class)
            ->createQueryBuilder('e');

        $queryBuilder->orderBy('e.salary', 'DESC');

        $employeesCount = (int)$count;
        $query = $queryBuilder->getQuery()
            ->setMaxResults($employeesCount);

        $employees = [];

        foreach ($query->getResult() as $employee) {
            /**
             * @var Employee $employees
            */
            $employees[] = $employee->getFullInfo();
        }

        return new JsonResponse($employees);
    }
}
