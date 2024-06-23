<?php

declare(strict_types=1);

namespace CarMaster\Manager;

use CarMaster\Entity\Company;
use CarMaster\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;

readonly class EmployeeManager
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param Generator $faker
     */
    public function __construct(private EntityManagerInterface $entityManager, private Generator $faker)
    {
    }

    /**
     * @param Company $company
     * @return Employee
     */
    public function createEmployee(Company $company): Employee
    {
        $employee = new Employee();
        $employee->setName($this->faker->name());
        $employee->setSurname($this->faker->lastName());
        $employee->setAge($this->faker->numberBetween(18, 50));
        $employee->setSalary($this->faker->numberBetween(300, 1000));
        $employee->setSpecialization($this->faker->jobTitle());
        $employee->setCompany($company);

        $this->entityManager->persist($employee);
        $this->entityManager->flush();

        return $employee;
    }
}