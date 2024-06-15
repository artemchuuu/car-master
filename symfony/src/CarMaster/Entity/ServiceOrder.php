<?php

declare(strict_types = 1);

namespace CarMaster\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'service_order')]
class ServiceOrder
{
    #[Id]
    #[GeneratedValue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(type: 'integer')]
    private string $serviceNumber;

    #[ManyToOne(targetEntity: Car::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'car_id', referencedColumnName: 'id')]
    private Car $car;

    #[ManyToOne(targetEntity: Part::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'part_id', referencedColumnName: 'id')]
    private Part $part;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    private Client $client;

    #[Column(name: 'work_hours', type: 'integer')]
    private int $workHours;

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

    /**
     * @return int
     */
    public function getWorkHours(): int
    {
        return $this->workHours;
    }

    /**
     * @param int $workHours
     * @return void
     */
    public function setWorkHours(int $workHours): void
    {
        $this->workHours = $workHours;
    }
}