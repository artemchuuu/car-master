<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Exceptions\NameValidationException;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'employee')]
class Employee
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(type: Types::STRING)]
    private string $name;

    #[Column(type: Types::STRING)]
    private string $surname;

    #[Column(type: Types::INTEGER)]
    private int $age;

    #[Column(type: Types::FLOAT)]
    private float $salary;

    #[Column(type: Types::STRING)]
    private string $specialization;

    #[ManyToOne(targetEntity: Company::class, inversedBy: 'employees')]
    #[JoinColumn(name: 'company_id', referencedColumnName: 'id')]
    private Company $company;

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

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getFullInfo(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'age' => $this->age,
            'salary' => $this->salary,
            'specialization' => $this->specialization,
            'company' => $this->company
        ];
    }

    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('The name is too short.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('The name is too long.');
        }
    }
}