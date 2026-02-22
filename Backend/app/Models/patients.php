<?php
namespace App\Models;

use App\Models\Model;
use PDO;

class Patients extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllPatients() {
        $sql = "SELECT * FROM patients";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}





    