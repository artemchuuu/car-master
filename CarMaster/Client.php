<?php

declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\NameValidationException;

abstract class Client
{
    protected string $name;
    protected int $phone;
    protected string $address;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->validName($name);
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $phone
     */
    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    public function validName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new NameValidationException('Занадто коротке ім\'я.');
        } elseif (strlen($name) > 32) {
            throw new NameValidationException('Занадто довге ім\'я.');
        }
    }
}