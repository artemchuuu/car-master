<?php

declare(strict_types = 1);

namespace CarMaster\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'service_order')]
class ServiceOrder
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(type: 'integer')]
    private string $serviceNumber;

    // TODO: приєднати Car
    private Car $car;

    // TODO: приєднати Part
    private Part $part;

    // TODO: приєднати Client
    private Client $client;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getServiceNumber(): string
    {
        return $this->serviceNumber;
    }

    /**
     * @param string $serviceNumber
     * @return void
     */
    public function setServiceNumber(string $serviceNumber): void
    {
        $this->serviceNumber = $serviceNumber;
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     * @return void
     */
    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    /**
     * @return Part
     */
    public function getPart(): Part
    {
        return $this->part;
    }

    /**
     * @param Part $part
     * @return void
     */
    public function setPart(Part $part): void
    {
        $this->part = $part;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return void
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
}