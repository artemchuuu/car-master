<?php

declare(strict_types=1);

namespace App\Controller\Api;

use CarMaster\DTO\UpdateCar;
use CarMaster\DTO\CreateCar;
use App\Repository\CarRepository;
use CarMaster\Entity\Car;
use CarMaster\Manager\CarManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/cars')]
class CarController extends AbstractController
{
    #[Route('/', methods: ['GET'], format: 'json')]
    public function list(
        CarRepository $carRepository,
        SerializerInterface $serializer,
        #[MapQueryParameter] int $page = 1
    ): Response {
        return new Response($serializer->serialize($carRepository->findPage($page), 'json', [
            'groups' => ['car_list']
        ]));
    }

    #[Route('/{id}', methods: ['GET'], format: 'json')]
    public function get(Car $car, SerializerInterface $serializer): Response
    {
        return new Response($serializer->serialize($car, 'json', [
            'groups' => ['car_item']
        ]));
    }

    #[Route('/', methods: ['POST'], format: 'json')]
    public function create(
        #[MapRequestPayload] CreateCar $createCar,
        CarManager $carManager,
        SerializerInterface $serializer
    ): Response {
        return new Response($serializer->serialize($carManager->createCarApi($createCar), 'json', [
            'groups' => ['car_info']
        ]), Response::HTTP_CREATED);
    }

    #[Route('/{id}', methods: ['PATCH'], format: 'json')]
    public function update(
        Car $car,
        #[MapRequestPayload] UpdateCar $updateCar,
        CarManager $carManager,
        SerializerInterface $serializer
    ): Response {
        return new Response($serializer->serialize($carManager->updateCar($updateCar, $car), 'json', [
            'groups' => ['car_info']
        ]));
    }

    #[Route('/{id}', methods: ['DELETE'], format: 'json')]
    public function delete(Car $car, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        try {
            $entityManager->remove($car);
            $entityManager->flush();
        } catch (ORMException $e) {
            $logger->error($e->getMessage());
            return new Response('Error during deletion.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}