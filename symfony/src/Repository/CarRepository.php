<?php

namespace App\Repository;

use CarMaster\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class CarRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    /**
     * @param string $vinCode
     * @return array
     */
    public function findByVinCode(string $vinCode): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.vinCode = :vinCode')
            ->setParameter('vinCode', $vinCode)
            ->getQuery()
            ->getResult();
    }
}