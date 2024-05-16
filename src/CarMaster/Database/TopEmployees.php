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

        $queryBuilder->select('company_id')
            ->where('company_id, 3');

        $queryBuilder->orderBy('e.salary', 'DESC');

        $result = $queryBuilder->getQuery()->getSQL();

        var_dump($result);
    }
}