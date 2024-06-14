<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\Brand;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'car')]
class Car
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(type: 'string', length: 150)]
    private Brand $brand;

    #[Column(type: 'string', length: 150)]
    private string $model;

    #[Column(type: 'string', length: 150)]
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
}