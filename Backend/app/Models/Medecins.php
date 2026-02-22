<?php
namespace App\Models;

use App\Models\Model;
use PDO;

class Medecins extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $sql = "SELECT * FROM medecins";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
