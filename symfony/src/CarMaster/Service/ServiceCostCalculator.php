<?php

declare(strict_types=1);

namespace CarMaster\Service;

use CarMaster\Entity\ServiceOrderInterface;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class ServiceCostCalculator
{
    private const HOURLY_PAY = 30;

    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    /**
     * @param ServiceOrderInterface $serviceOrder
     * @return float
     */
    public function calculateTotalCost(ServiceOrderInterface $serviceOrder): float
    {
        if ($serviceOrder->getPart()->getPrice() === null or $serviceOrder->getWorkHours() < 0) {
            $this->logger->error('An unsuccessful attempt.', ['service_order' => $serviceOrder]);
            throw new InvalidArgumentException('Incorrect Service Order data!');
        }

        return $serviceOrder->getPart()->getPrice() + $serviceOrder->getWorkHours() * self::HOURLY_PAY;
    }
}