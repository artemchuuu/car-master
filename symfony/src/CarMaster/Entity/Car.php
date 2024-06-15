<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: "CarRepository")]
#[Table(name: 'car')]
class Car
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(type: 'string', length: 150)]
    private string $brand;

    #[Column(type: 'string', length: 150)]
    private string $model;

    #[Column(type: 'string', length: 150)]
    private string $vinCode;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'cars')]
    #[JoinColumn(name: 'client_id', referencedColumnName: 'id')]
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
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return void
     */
    public function setBrand(string $brand): void
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
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'vinCode' => $this->vinCode,
        ];
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
}