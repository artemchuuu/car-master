<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Serializer\Attribute as Serialize;

#[Entity(repositoryClass: CarRepository::class)]
#[Table(name: 'car')]
class Car
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    #[Serialize\Groups(['car_list', 'car_item', 'car_create'])]
    private int $id;

    #[Column(type: 'string', length: 150)]
    #[Serialize\Groups(['car_list', 'car_item', 'car_create'])]
    private string $brand;

    #[Column(type: 'string', length: 150)]
    #[Serialize\Groups(['car_list', 'car_item', 'car_create'])]
    private string $model;

    #[Column(type: 'string', length: 150)]
    #[Serialize\Groups(['car_list', 'car_item', 'car_create'])]
    private string $vinCode;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'cars')]
    #[JoinColumn(name: 'client_id', referencedColumnName: 'id')]
    #[Serialize\Groups(['car_list', 'car_item'])]
    #[Serialize\MaxDepth(1)]
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
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'vinCode' => $this->getVinCode(),
            'client' => $this->getClient()->getFullInfo(),
        ];
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