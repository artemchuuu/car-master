<?php

namespace App\Repository;

use CarMaster\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function findEmployeesWithHighestSalary(int $count): array
    {
        $queryBuilder = $this->createQueryBuilder('e');

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

        return $employees;
    }
}