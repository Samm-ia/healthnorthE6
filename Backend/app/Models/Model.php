<?php
namespace App\Models;

use App\Core\Database;


class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }
}
