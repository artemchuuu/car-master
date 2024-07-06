<?php

namespace App\Repository;

use CarMaster\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class CarRepository extends ServiceEntityRepository
{
    const CARS_PER_PAGE = 10;

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

    /**
     * @param int $page
     * @return array
     */
    public function findPage(int $page = 1): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id')
            ->getQuery()
            ->setFirstResult(($page - 1) * self::CARS_PER_PAGE)
            ->setMaxResults(self::CARS_PER_PAGE)
            ->getResult();
    }
}