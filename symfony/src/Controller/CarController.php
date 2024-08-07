<?php

namespace App\Controller;

use CarMaster\DTO\CreateCar;
use CarMaster\Manager\CarManager;
use Doctrine\ORM\EntityManagerInterface;
use CarMaster\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/car')]
final class CarController extends AbstractController
{
    #[Route('/{name}/{surname}', name: 'app_car_create')]
    public function create(
        string $name,
        string $surname,
        EntityManagerInterface $entityManager,
        CarManager $carManager,
    ): JsonResponse {
        $client = $entityManager->getRepository(Client::class)->findOneBy([
            'name' => $name,
            'surname' => $surname,
        ]);

        if (!$client) {
            throw $this->createNotFoundException('Client not found');
        }

        return new JsonResponse($carManager->createCar(new CreateCar(), $client)->getFullInfo());
    }
}
