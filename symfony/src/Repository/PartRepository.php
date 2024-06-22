<?php

namespace App\Repository;

use CarMaster\Entity\Part;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Part::class);
    }

    public function findById(string $id)
    {
        $queryBuilder = $this->createQueryBuilder('p');

        $queryBuilder
            ->where('p.id = :id');

        $query = $queryBuilder->getQuery();

        return $query->getResult();
    }
}