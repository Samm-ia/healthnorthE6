<?php



use PDO;

class rdvModel extends Model {

    public function __construct() {
        parent::__construct(); 
    }

    public function isAvailable($date, $heure, $id_medecin): bool {
        $sql = "SELECT COUNT(*) FROM RendezVous 
                WHERE date_rdv = ? AND heure = ? AND id_medecin = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$date, $heure, $id_medecin]);
        return $stmt->fetchColumn() == 0;
    }

    public function create($date, $heure, $id_medecin, $id_patient) {
        $sql = "INSERT INTO RendezVous (date_rdv, heure, id_medecin, id_patient, statut)
                VALUES (?, ?, ?, ?, 'En attente')";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$date, $heure, $id_medecin, $id_patient]);
    }

    public function getByPatient($id_patient): array {
        $sql = "SELECT r.*, m.nom AS medecin_nom, m.prenom
         AS medecin_prenom FROM RendezVous r JOIN medecins m 
         ON r.id_medecin = m.id_medecin WHERE r.id_patient = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_patient]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   public function getByMedecin($id_medecin): array {
    $sql = "SELECT r.*, p.nom AS patient_nom, p.prenom AS patient_prenom
            FROM RendezVous r
            JOIN patients p ON r.id_patient = p.id_patient
            WHERE r.id_medecin = ?
            ORDER BY date_rdv, heure";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id_medecin]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getAll(): array {
    $sql = "SELECT r.*, 
            p.nom AS patient_nom, p.prenom AS patient_prenom,
            m.nom AS medecin_nom, m.prenom AS medecin_prenom
            FROM RendezVous r
            JOIN patients p ON r.id_patient = p.id_patient
            JOIN medecins m ON r.id_medecin = m.id_medecin
            ORDER BY date_rdv, heure";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function updateStatut($id_rdv, $statut) {
    $sql = "UPDATE RendezVous SET statut = ? WHERE id_rdv = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$statut, $id_rdv]);
}
}

