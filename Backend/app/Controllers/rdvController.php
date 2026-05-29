<?php
require_once __DIR__ . '/../Models/rdvModel.php';
require_once __DIR__ . '/../Models/Medecins.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/ordonnance.php';
require_once __DIR__ . '/../Models/Patients.php';

class RdvController {

    public function index() { 
        $medecinModel = new Medecins(); 
        $medecins = $medecinModel->getAll(); 
        require __DIR__ . '/../Views/rdv.php';
    }

    public function create() {
        $date       = $_POST['date_rdv'];
        $heure      = $_POST['heure'];
        $id_medecin = $_POST['id_medecin'];

        $patientModel = new Patients();
        $patient = $patientModel->getByUserId($_SESSION['user_id']);
        $id_patient = $patient['id_patient']; 

        $model = new rdvModel();
        if ($model->isAvailable($date, $heure, $id_medecin)) {
            $model->create($date, $heure, $id_medecin, $id_patient);
            header("Location: ?controller=rdv&action=mesRdv");
            exit;
        } else {
            echo "Ce créneau n'est pas disponible.";
        }
    }

    public function mesRdv() {
        if (!isset($_SESSION['user_id'])) {
            echo "Vous devez être connecté.";
            return;
        }

        $patientModel = new Patients();
        $patient = $patientModel->getByUserId($_SESSION['user_id']);
        $id_patient = $patient['id_patient'];

        $model = new rdvModel();
        $rdvs = $model->getByPatient($id_patient);

        require __DIR__ . '/../Views/mesrdv.php';
    }

   public function mesRdvMedecin() {
    if (!isset($_SESSION['user_id'])) {
        echo "Vous devez être connecté.";
        return;
    }

    $medecinModel = new Medecins();
    $medecin = $medecinModel->getByUserId($_SESSION['user_id']);
    $id_medecin = $medecin['id_medecin'];

    $model = new rdvModel();
    $rdvs = $model->getByMedecin($id_medecin);

    require __DIR__ . '/../Views/rdvMedecins.php';
}
    public function dossier() {
        if (!isset($_SESSION['user_id'])) {
            echo "Vous devez être connecté.";
            return;
        }

        $userModel = new User();
        $user = $userModel->getById($_SESSION['user_id']);

        $rdvModel = new rdvModel();
        $rdvs = $rdvModel->getByPatient($_SESSION['user_id']);

        require __DIR__ . '/../Views/dossier.php';
    }

    public function createOrdonnance() { 
        if ($_SESSION['user']['role'] !== 'medecin') { 
            echo "Accès interdit."; 
            return; 
        } 
        $medecinModel = new Medecins();
$medecin = $medecinModel->getByUserId($_SESSION['user_id']);
$id_medecin = $medecin['id_medecin'];
        $id_patient = $_POST['id_patient']; 
        $contenu = $_POST['contenu'];
        $ordModel = new Ordonnance(); 
        $ordModel->create($id_medecin, $id_patient, $contenu); 
        header("Location: ?controller=rdv&action=mesRdvMedecin"); 
        exit; 
    }

    public function mesOrdonnances() {
        $patientModel = new Patients();
        $patient = $patientModel->getByUserId($_SESSION['user_id']);
        $id_patient = $patient['id_patient'];

        $ordModel = new Ordonnance();
        $ordonnances = $ordModel->getByPatient($id_patient);

        require __DIR__ . '/../Views/mesOrdonnances.php';
    }
}

