<?php

declare(strict_types=1);

namespace CarMaster;

use PDO;

class ServiceFactory
{
    public function create(): PDO
    {
        $pdo = new PDO(
            sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOST'), getenv('DB_NAME')),
            getenv('DB_USER'),
            getenv('DB_PASSWORD')
        );
        $pdo->query('SET NAMES utf8');

        return $pdo;
    }
}