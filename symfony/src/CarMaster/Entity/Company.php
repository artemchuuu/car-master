<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'company')]
class Company
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    private int $id;

    #[Column(type: Types::STRING)]
    private string $name;

    #[Column(type: Types::STRING)]
    private string $email;

    #[Column(type: Types::STRING)]
    private string $website;

    #[Column(type: Types::STRING)]
    private string $about;

    #[OneToMany(targetEntity: Employee::class, mappedBy: 'company')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

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
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $website
     * @return void
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getAbout(): string
    {
        return $this->about;
    }

    /**
     * @param string $about
     * @return void
     */
    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getEmployee(): ArrayCollection|Collection
    {
        return $this->employees;
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    /**
     * @return array
     */
    public function getFullInfo(): array
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "website" => $this->getWebsite(),
            "about" => $this->getAbout(),
            "employee" => $this->getEmployee()
        ];
    }
}