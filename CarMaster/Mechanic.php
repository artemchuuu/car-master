<?php

namespace CarMaster;

require_once "Employees.php";

class Mechanic extends Employees // механік
{
    public function __construct(string $name, int $age, int $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    public function startOfTheRepair(): void
    {
        parent::startOfTheRepair();
        echo "Механік: Оглядаю двигун, шукаю поломку.\nМеханік: Розбираю, мічую деталі.\nМеханік: Міняю зношені, чищу, змащую.\nМеханік: Збираю, дотримуюся схеми, затягую болти.";
    }
}