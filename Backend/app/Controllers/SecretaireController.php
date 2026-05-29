<?php
require_once __DIR__ . '/../Models/rdvModel.php';

class SecretaireController {

    public function index() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user']['role'] !== 'secretaire') {
            header('Location: /?controller=login&action=index');
            exit;
        }

        $model = new rdvModel();
        $rdvs = $model->getAll();

        require __DIR__ . '/../Views/secretaire.php';
    }

    public function updateStatut() {
        $id_rdv  = $_POST['id_rdv'];
        $statut  = $_POST['statut'];

        $model = new rdvModel();
        $model->updateStatut($id_rdv, $statut);

        header('Location: /?controller=secretaire&action=index');
        exit;
    }
}