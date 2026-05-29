<?php

require_once __DIR__ . '/Model.php';

class Patients extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function create($nom, $prenom, $email, $mdp, $num_secu, $id_user) {
    $sql = "INSERT INTO Patients (nom, prenom, email, mdp, num_secu, id_user) 
            VALUES (:nom, :prenom, :email, :mdp, :num_secu, :id_user)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':nom'      => $nom,
        ':prenom'   => $prenom,
        ':email'    => $email,
        ':mdp'      => $mdp,
        ':num_secu' => $num_secu,
        ':id_user'  => $id_user
    ]);
}

    public function getAllPatients() {
        $sql = "SELECT * FROM patients";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function getByUserId($id_user) {
    $sql = "SELECT * FROM Patients WHERE id_user = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id_user]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}



    