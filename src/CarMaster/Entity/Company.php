<?php

declare(strict_types=1);

namespace CarMaster\Entity;

class Company
{
    private string $name;

    private string $email;

    private string $website;

    private string $about;

    private array $employee;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function getAbout(): string
    {
        return $this->about;
    }

    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    public function getEmployee(): array
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): void
    {
        $this->employee[] = $employee;
    }
}