<?php
namespace App\Models;

use App\Models\Model;
use PDO;

class Ordonnance extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function create($id_medecin, $id_patient, $contenu) {
        $sql = "INSERT INTO ordonnances (id_medecin, id_patient, contenu, date_creation)
                VALUES (?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_medecin, $id_patient, $contenu]);
    }

    public function getByPatient($id_patient) {
        $sql = "SELECT o.*, u.nom AS medecin_nom, u.prenom AS medecin_prenom
                FROM ordonnances o
                JOIN users u ON o.id_medecin = u.id
                WHERE o.id_patient = ?
                ORDER BY date_creation DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_patient]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
