<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use App\Repository\ClientRepository;
use CarMaster\Entity\Exceptions\NameValidationException;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Serializer\Attribute as Serialize;

#[Entity(repositoryClass: ClientRepository::class)]
#[Table(name: 'client')]
class Client
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    #[Serialize\Groups(['car_list', 'car_item'])]
    private int $id;

    #[Column(type: 'string', length: 150)]
    #[Serialize\Groups(['car_list', 'car_item'])]
    private string $name;

    #[Column(type: 'string', length: 150)]
    #[Serialize\Groups(['car_list', 'car_item'])]
    private string $surname;

    #[OneToMany(targetEntity: Car::class, mappedBy: 'client')]
    #[JoinColumn(name: 'car_id', referencedColumnName: 'id')]
    #[Serialize\Groups(['car_item'])]
    #[Serialize\MaxDepth(1)]
    private Collection $cars;

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

    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function setCars(Collection $cars): void
    {
        $this->cars = $cars;
    }

    public function getFullInfo(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'cars' => $this->getCars()
        ];
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