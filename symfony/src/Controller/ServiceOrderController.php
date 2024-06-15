<?php

namespace App\Controller;

use CarMaster\Entity\Car;
use CarMaster\Manager\ServiceOrderManager;
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
    public function totalCost()
    {
        // todo: метод який відповідатиме за підрахунки загальної вартості
    }

    #[Route('/service-order/create/{serviceNumber}/{carVinCode}/{partId}/{workHours}', name: 'app_service_order_create')]
    public function create(string $serviceNumber, string $carVinCode, string $partId, EntityManagerInterface $entityManager, ServiceOrderManager $serviceOrderManager): JsonResponse
    {
        $car = $this->$entityManager->getRepository(Car::class)->findOneBy([
            'vin_code' => $carVinCode
        ]);

        return new JsonResponse([$serviceOrderManager->createOrder($serviceNumber, $car, $partId, $entityManager)]);
    }
}
