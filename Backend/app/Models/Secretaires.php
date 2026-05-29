<?php

require_once __DIR__ . '/Model.php';

class Secretaires extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function create($nom, $prenom, $email, $mdp, $id_user) {
        $sql = "INSERT INTO Secretaires (nom, prenom, email, mdp, id_user) 
                VALUES (:nom, :prenom, :email, :mdp, :id_user)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nom'     => $nom,
            ':prenom'  => $prenom,
            ':email'   => $email,
            ':mdp'     => $mdp,
            ':id_user' => $id_user
        ]);
    }

    public function getByUserId($id_user) {
        $sql = "SELECT * FROM Secretaires WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}