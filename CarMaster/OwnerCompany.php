<?php

declare(strict_types=1);

namespace CarMaster;

class OwnerCompany extends Client
{
    private string $email;
    private string $website;

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