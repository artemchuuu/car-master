<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Exceptions\NameValidationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'client')]
class Client
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    private int $id;

    #[Column(type: 'string', length: 150)]
    private string $name;

    #[Column(type: 'string', length: 150)]
    private string $surname;

    #[OneToOne(targetEntity: Car::class, inversedBy: 'clients')]
    private array $cars;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->validName($name);
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function setCars(array $cars): void
    {
        $this->cars = $cars;
    }

    /**
     * @param string $name
     * @return void
     */
    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('The name is too short.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('The name is too long.');
        }
    }
}