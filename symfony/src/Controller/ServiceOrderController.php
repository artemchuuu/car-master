<?php

namespace App\Controller;

use CarMaster\Entity\Car;
use CarMaster\Entity\Part;
use CarMaster\Entity\ServiceOrder;
use CarMaster\Manager\ServiceOrderManager;
use CarMaster\Service\ServiceCostCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ServiceOrderController extends AbstractController
{
    #[Route('/service', name: 'app_service_order')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServiceOrderController.php',
        ]);
    }

    #[Route('/service/{id}/total-cost', name: 'app_service_order_total_cost')]
    public function totalCost($id, ServiceCostCalculator $serviceCostCalculator, EntityManagerInterface $entityManager): JsonResponse
    {
        $serviceOrderRepository = $entityManager->getRepository(ServiceOrder::class);

        $serviceOrder = $serviceOrderRepository->find($id);

        $serviceCostCalculator->calculateTotalCost($serviceOrder);

        return new JsonResponse([$serviceCostCalculator]);
    }

    #[Route('/service-order/create/{serviceNumber}/{carVinCode}/{partId}/{workHours}', name: 'app_service_order_create')]
    public function create(int $serviceNumber, string $carVinCode, int $partId, int $workHours, EntityManagerInterface $entityManager, ServiceOrderManager $serviceOrderManager): JsonResponse
    {
        $car = $entityManager->getRepository(Car::class)->findOneBy([
            'vinCode' => $carVinCode,
        ]);

        $part = $entityManager->getRepository(Part::class)->findOneBy([
            'id' => $partId,
        ]);

        return new JsonResponse($serviceOrderManager->createOrder($serviceNumber, $car, $part, $workHours)->getFullInfo());
    }
}
