<?php

namespace CarMaster\Database;



use CarMaster\Entity\Employee;
use CarMaster\ServiceFactory;

class TopEmployees
{
    public function execute(): void
    {
        $services = new ServiceFactory();
        $entityManager = $services->createORMEntityManager();
        $queryBuilder = $entityManager->getRepository(Employee::class)
            ->createQueryBuilder('e');

        $queryBuilder
            ->select('e.id, e.name, e.surname, e.age, e.salary')
            ->orderBy('e.age', 'DESC');

        $result = $queryBuilder->getQuery()->getResult();

        foreach ($result as $employee) {
            echo $employee['name'] . " " . $employee['surname'] . " " . $employee['age'] . " ";
        }
    }
}