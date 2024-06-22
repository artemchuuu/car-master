<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use App\Repository\EmployeeRepository;
use CarMaster\Entity\Exceptions\NameValidationException;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: EmployeeRepository::class)]
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return void
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     * @return void
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    /**
     * @param string $specialization
     * @return void
     */
    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     * @return void
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    /**
     * @return array
     */
    public function getFullInfo(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'salary' => $this->getSalary(),
            'specialization' => $this->getSpecialization(),
            'company_id' => $this->getCompany()->getId()
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