<?php

declare(strict_types=1);

namespace CarMaster;

class OwnerCompany extends Client // компанія
{
    private string $email; // електронна пошта компанії
    private string $website; // веб сайт
    public function __construct(string $name, string $address, int $phone, string $email, string $website)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->website = $website;
    }

    /**
     * @param string $email
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
}