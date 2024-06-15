<?php

declare(strict_types=1);

namespace CarMaster\Manager;

use CarMaster\Entity\Car;
use CarMaster\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;

readonly class CarManager
{
    public function __construct(private EntityManagerInterface $entityManager, private Generator $faker)
    {
    }

    public function createCar(Client $client): Car
    {
        $car = new Car();
        $car->setBrand($this->faker->word());
        $car->setModel($this->faker->word());
        $car->setVinCode($this->faker->randomLetter());
        $car->setClient($client);


        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return $car;
    }
}