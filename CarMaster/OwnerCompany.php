<?php

declare(strict_types=1);

namespace CarMaster;

class OwnerCompany extends Client
{
    private string $email;
    private string $website;

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
}