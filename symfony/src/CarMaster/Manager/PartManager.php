<?php

declare(strict_types=1);

namespace CarMaster\Manager;

use CarMaster\Entity\Part;
use Doctrine\ORM\EntityManagerInterface;

readonly class PartManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createPart($name, $price): Part
    {
        $part = new Part();
        $part->setName($name);
        $part->setPrice($price);

        $this->entityManager->persist($part);
        $this->entityManager->flush();

        return $part;
    }
}