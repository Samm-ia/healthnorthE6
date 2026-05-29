<?php

class Medecins extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $sql = "SELECT * FROM medecins";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nom, $prenom, $email, $mdp, $specialite, $id_user) {
    $sql = "INSERT INTO Medecins (nom, prenom, email, mdp, specialite, id_user) 
            VALUES (:nom, :prenom, :email, :mdp, :specialite, :id_user)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':nom'       => $nom,
        ':prenom'    => $prenom,
        ':email'     => $email,
        ':mdp'       => $mdp,
        ':specialite' => $specialite,
        ':id_user'   => $id_user
    ]);
}
public function getByUserId($id_user) {
    $sql = "SELECT * FROM Medecins WHERE id_user = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id_user]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}