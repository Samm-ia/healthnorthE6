<?php
namespace App\Controllers;

use App\Models\ordonnance;
use App\Models\rdvModel;
use App\Models\Medecins;
use App\Models\User;


class RdvController {

   public function index() { 
    $medecinModel = new Medecins(); 
    $medecins = $medecinModel->getAll(); 
    require __DIR__ . '/../Views/rdv.php';
    }

   public function create() {
   // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      //  echo "Méthode non autorisée";
        //return;
  //  }

    $date = $_POST['date_rdv'];
    $heure = $_POST['heure'];
    $id_medecin = $_POST['id_medecin'];
    $id_patient = $_SESSION['user_id'];

    require_once __DIR__ . '/../Models/rdvModel.php';
    $model = new rdvModel();

    if ($model->isAvailable($date, $heure, $id_medecin)) {
        $model->create($date, $heure, $id_medecin, $id_patient);
        header("Location: ?controller=rdv&action=index");
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
    $model = new rdvModel();

    $rdvs = $model->getByPatient($_SESSION['user_id']);

    require __DIR__ . '/../Views/mesrdv.php';
}
public function mesRdvMedecin() {
    if (!isset($_SESSION['user_id'])) {
        echo "Vous devez être connecté.";
        return;
    }

    $model = new rdvModel();
    $rdvs = $model->getByMedecin($_SESSION['user_id']);

    require __DIR__ . '/../Views/mesrdv_medecin.php';
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
        return; } 
        $id_medecin = $_SESSION['user_id']; 
        $id_patient = $_POST['id_patient']; 
        $contenu = $_POST['contenu'];
        $ordModel = new Ordonnance(); 
        $ordModel->create($id_medecin, $id_patient, $contenu); 
        header("Location: ?controller=rdv&action=mesRdvMedecin"); 
        exit; }


        public function mesOrdonnances() {
    $ordModel = new Ordonnance();
    $ordonnances = $ordModel->getByPatient($_SESSION['user_id']);

    require __DIR__ . '/../Views/mes_ordonnances.php';
}



}



////LTER TABLE `RendezVous`
 /// DROP `specialite`,          
 /// DROP `prix`,
 /// DROP `id_secretaire`;