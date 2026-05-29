<?php

use PDO;

class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }
}
