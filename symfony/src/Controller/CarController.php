<?php

namespace App\Controller;

use CarMaster\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use CarMaster\Entity\Client;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CarController.php',
        ]);
    }


    #[Route('/car/{brand}/{model}/{vinCode}', name: 'app_car_create')]
    public function create(string $brand, string $model, string $vinCode, EntityManagerInterface $entityManager): JsonResponse
    {
        $faker = Factory::create();

        $client = new Client();
        $client->setName($faker->firstName());
        $client->setSurname($faker->lastName());

        $entityManager->persist($client);
        $entityManager->flush();

        $car = new Car();
        $car->setBrand($brand);
        $car->setModel($model);
        $car->setVinCode($vinCode);
        $car->setClient($client);


        $entityManager->persist($car);
        $entityManager->flush();

        return $this->json([$car->getFullInfo()]);
    }
}
