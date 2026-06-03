<?php

use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=mysql-healthnorth.alwaysdata.net;dbname=healthnorth_bdd;charset=utf8",
                "healthnorth",
                "ilestminuit"
            );
        }

        return self::$instance;
    }
}
