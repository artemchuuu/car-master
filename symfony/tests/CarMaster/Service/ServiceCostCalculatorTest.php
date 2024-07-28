<?php

namespace App\Tests\CarMaster\Service;

use CarMaster\Entity\Part;
use CarMaster\Entity\ServiceOrder;
use CarMaster\Service\ServiceCostCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ServiceCostCalculatorTest extends TestCase
{
    public function testCalculateTotalCost()
    {
        $logger = $this->createStub(LoggerInterface::class);
        $part = $this->createMock(Part::class);
        $part->method('getPrice')->willReturn(100.1);
        $serviceOrder = $this->createMock(ServiceOrder::class);
        $serviceOrder->method('getPart')->willReturn($part);
        $serviceOrder->method('getWorkHours')->willReturn(5);

        $this->assertInstanceOf(Part::class, $part);
        $this->assertInstanceOf(ServiceOrder::class, $serviceOrder);

        $serviceOrderCalculatorSUT = new ServiceCostCalculator($logger);
        $totalCost = $serviceOrderCalculatorSUT->calculateTotalCost($serviceOrder);
        $this->assertEquals(250.1, $totalCost);
    }

    public function testCalculateTotalCostIfNull()
    {
        $part = $this->createMock(Part::class);
        $part->method('getPrice')->willReturn(null);
        $serviceOrder = $this->createMock(ServiceOrder::class);
        $serviceOrder->method('getPart')->willReturn($part);

        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('error')
            ->with(
                'An unsuccessful attempt.',
                $this->callback(function ($context) use ($serviceOrder) {
                    return isset($context['service_order']) && $context['service_order'] === $serviceOrder;
                })
            );

        $serviceOrderCalculatorSUT = new ServiceCostCalculator($logger);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect Service Order data!');
        $serviceOrderCalculatorSUT->calculateTotalCost($serviceOrder);
    }

    public function testCalculateTotalCostIfLessThanZero()
    {
        $serviceOrder = $this->createMock(ServiceOrder::class);
        $serviceOrder->method('getWorkHours')->willReturn(-1);
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('error')
            ->with(
                'An unsuccessful attempt.',
                $this->callback(function ($context) use ($serviceOrder) {
                    return isset($context['service_order']) && $context['service_order'] === $serviceOrder;
                })
            );

        $serviceOrderCalculatorSUT = new ServiceCostCalculator($logger);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect Service Order data!');
        $serviceOrderCalculatorSUT->calculateTotalCost($serviceOrder);
    }
}