<?php

namespace CarMaster\Database;

use CarMaster\Entity\Employee;
use CarMaster\ServiceFactory;

class ExportData
{
    public function exportEmployees(): void
    {
        $exportFileName = __DIR__ . '/../../../export/employees.csv';

        $file = fopen($exportFileName, 'w');

        $services = new ServiceFactory();
        $entityManager = $services->createORMEntityManager();
        $query = $entityManager->getRepository(Employee::class)
            ->createQueryBuilder('b')
            ->getQuery();

        foreach ($query->toIterable() as $employee) {
            /** @var Employee $employee */
            fputcsv($file, $employee->getFullInfo());
            $entityManager->detach($employee);
        }

        fclose($file);
    }
}