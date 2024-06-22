<?php

declare(strict_types=1);

namespace CarMaster\Service;

use CarMaster\Entity\ServiceOrder;

class ServiceCostCalculator
{
    private const HOURLY_PAY = 30;

    /**
     * @param ServiceOrder $serviceOrder
     * @return float
     */
    public function calculateTotalCost(ServiceOrder $serviceOrder): float
    {
        return $serviceOrder->getPart()->getPrice() + $serviceOrder->getWorkHours() * self::HOURLY_PAY;
    }
}