<?php


use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=healthnorthE6;charset=utf8",
                "root",
                "root"
            );
        }

        return self::$instance;
    }
}
