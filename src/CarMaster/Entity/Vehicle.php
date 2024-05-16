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

abstract class Vehicle
{
    private int $id;

    private Brand $brand;

    private string $model;

    private string $color;

    private DateTime $releaseDate;

    private Client $client;

    private string $stateNumber;

    private int $mileage;

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

    public function getType(): string
    {
        return trim(str_replace(__NAMESPACE__, '', get_called_class()), '\\');
    }
}