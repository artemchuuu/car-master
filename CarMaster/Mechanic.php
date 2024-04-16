<?php

declare(strict_types=1);

namespace CarMaster;

class Mechanic extends Employees
{
    public function startOfTheRepair(): void
    {
        parent::startOfTheRepair();
        echo "Механік: Оглядаю двигун, шукаю поломку.\nМеханік: Розбираю, мічую деталі.\nМеханік: Міняю зношені, чищу, змащую.\nМеханік: Збираю, дотримуюся схеми, затягую болти.";
    }
}