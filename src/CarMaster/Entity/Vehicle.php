<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brand;
use DateTime;

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
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return void
     */
    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return void
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return void
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime $releaseDate
     * @return void
     */
    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
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
     * @return string
     */
    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    /**
     * @param string $stateNumber
     * @return void
     */
    public function setStateNumber(string $stateNumber): void
    {
        $this->stateNumber = $stateNumber;
    }

    /**
     * @return int
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

    /**
     * @param int $mileage
     * @return void
     */
    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    /**
     * @return string
     */
    public function getVinCode(): string
    {
        return $this->vinCode;
    }

    /**
     * @param string $vinCode
     * @return void
     */
    public function setVinCode(string $vinCode): void
    {
        $this->vinCode = $vinCode;
    }

    /**
     * @return array
     */
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

    /**
     * @return string
     */
    public function getType(): string
    {
        return trim(str_replace(__NAMESPACE__, '', get_called_class()), '\\');
    }
}