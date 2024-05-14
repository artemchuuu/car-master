<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brand;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'vehicle')]
#[InheritanceType('SINGLE_TABLE')]
#[DiscriminatorColumn(name: 'type', type: 'string')]
#[DiscriminatorMap(['Car' => Car::class, 'Motorbike' => Motorbike::class])]
abstract class Vehicle
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(type: Types::STRING, length: 150)]
    private Brand $brand;

    #[Column(type: Types::STRING, length: 150)]
    private string $model;

    #[Column(type: Types::STRING, length: 150)]
    private string $color;

    #[Column(type: Types::DATE_MUTABLE)]
    private DateTime $releaseDate;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'vehicles')]
    #[JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    private Client $client;

    #[Column(type: Types::STRING, length: 25)]
    private string $stateNumber;

    #[Column(type: Types::INTEGER)]
    private int $mileage;

    #[Column(type: Types::STRING, length: 17)]
    private string $vinCode;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    public function setStateNumber(string $stateNumber): void
    {
        $this->stateNumber = $stateNumber;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function getVinCode(): string
    {
        return $this->vinCode;
    }

    public function setVinCode(string $vinCode): void
    {
        $this->vinCode = $vinCode;
    }

    public function getFullInfo(): array
    {
        return [
            'Brand' => $this->getBrand()->value,
            'Model' => $this->model,
            'Color' => $this->color,
            'ReleaseDate' => $this->getReleaseDate()->format('Y-m-d'),
            'Client' => $this->getClient()->getFullName(),
            'StateNumber' => $this->stateNumber,
            'Mileage' => $this->mileage,
            'VinCode' => $this->vinCode,

        ];
    }
}