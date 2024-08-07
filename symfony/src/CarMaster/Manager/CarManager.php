<?php

declare(strict_types=1);

namespace CarMaster\Manager;

use CarMaster\DTO\UpdateCar;
use CarMaster\DTO\CreateCar;
use App\Repository\ClientRepository;
use CarMaster\Entity\Car;
use CarMaster\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Faker\Generator;

readonly class CarManager
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param ClientRepository $clientRepository
     * @param Generator $faker
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ClientRepository $clientRepository,
        private Generator $faker
    ) {
    }

    /**
     * @param CreateCar $createCar
     * @param Client|null $client
     * @return Car
     */
    public function createCar(CreateCar $createCar, ?Client $client = null): Car
    {
        if (!$client) {
            $client = $this->clientRepository->find($createCar->clientId);
        }

        if (!$client) {
            throw new EntityNotFoundException('Client is not found.');
        }

        $car = new Car();
        $car->setBrand($createCar->brand ?: $this->faker->word());
        $car->setModel($createCar->model ?: $this->faker->word());
        $car->setVinCode($createCar->vinCode ?: $this->faker->randomLetter());
        $car->setClient($client);
        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return $car;
    }

    /**
     * @param UpdateCar $updateCar
     * @param Car $car
     * @return Car
     */
    public function updateCar(UpdateCar $updateCar, Car $car): Car
    {
        if ($updateCar->brand !== null) {
            $car->setBrand($updateCar->brand);
        }

        if ($updateCar->model !== null) {
            $car->setModel($updateCar->model);
        }

        if ($updateCar->vinCode !== null) {
            $car->setVinCode($updateCar->vinCode);
        }

        $this->entityManager->flush();

        return $car;
    }
}