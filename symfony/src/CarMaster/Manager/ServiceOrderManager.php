<?php

declare(strict_types=1);

namespace CarMaster\Manager;

use CarMaster\Entity\Car;
use CarMaster\Entity\Part;
use CarMaster\Entity\ServiceOrder;
use Doctrine\ORM\EntityManagerInterface;

readonly class ServiceOrderManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createOrder($serviceNumber, Car $car, Part $part, $workHours): ServiceOrder
    {
        $serviceOrder = new ServiceOrder();
        $serviceOrder->setServiceNumber($serviceNumber);
        $serviceOrder->setCar($car);
        $serviceOrder->setPart($part);
        $serviceOrder->setWorkHours($workHours);

        $this->entityManager->persist($serviceOrder);
        $this->entityManager->flush();

        return $serviceOrder;
    }
}