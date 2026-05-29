<?php
require_once __DIR__ . '/../Models/rdvModel.php';
require_once __DIR__ . '/../Models/Ordonnance.php';

class MedecinController {

       public function index() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'medecin') {
            header('Location: ?controller=login&action=index');
            exit;
        }

        $model = new rdvModel();
        $rdvs = $model->getAll();

       require __DIR__ . '/../Views/rdvMedecins.php';
    }

        public function updateStatut() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'medecin') {
            header('Location: ?controller=login&action=index');
            exit;
        }

        if (isset($_POST['id_rdv']) && isset($_POST['statut'])) {
            $id_rdv  = $_POST['id_rdv'];
            $statut  = $_POST['statut'];

            $model = new rdvModel();
            $model->updateStatut($id_rdv, $statut);
        }

        header('Location: ?controller=medecin&action=index');
        exit;
    }

        public function historiqueOrdonnances() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'medecin') {
            header('Location: ?controller=login&action=index');
            exit;
        }
        
       
        require __DIR__ . '/../Views/medecin_historique.php';
    }

    
    public function RecherchePatient() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'medecin') {
            header('Location: ?controller=login&action=index');
            exit;
        }
        
        require __DIR__ . '/../Views/medecin_patients.php';
    }
}