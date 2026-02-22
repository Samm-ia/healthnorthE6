<?php

namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=healthnorth;charset=utf8",
                "root",
                "root"
            );
        }

        return self::$instance;
    }
}
