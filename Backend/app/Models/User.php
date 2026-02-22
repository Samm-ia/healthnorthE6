<?php
namespace App\Models;

use PDO;

class User extends Model {

    public function __construct() {
        parent::__construct(); // initialise $this->pdo
    }

    public function create($nom, $prenom, $email, $password, $role) {
        $sql = "INSERT INTO users (nom, prenom, email, password, role) 
                VALUES (:nom, :prenom, :email, :password, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role
        ]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get($email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}


