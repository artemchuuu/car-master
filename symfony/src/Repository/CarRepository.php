<?php

namespace App\Repository;

use CarMaster\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findByVinCode(string $vinCode): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.vinCode = :vinCode')
            ->setParameter('vinCode', $vinCode)
            ->getQuery()
            ->getResult();
    }
}