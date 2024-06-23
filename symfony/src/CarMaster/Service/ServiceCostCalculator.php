<?php

declare(strict_types=1);

namespace CarMaster\Service;

use CarMaster\Entity\ServiceOrder;
use CarMaster\Entity\ServiceOrderInterface;

class ServiceCostCalculator
{
    private const HOURLY_PAY = 30;

    /**
     * @param ServiceOrder $serviceOrder
     * @return float
     */
    public function calculateTotalCost(ServiceOrderInterface $serviceOrder): float
    {
        return $serviceOrder->getPart()->getPrice() + $serviceOrder->getWorkHours() * self::HOURLY_PAY;
    }
}