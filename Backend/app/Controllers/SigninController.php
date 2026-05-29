<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Medecins.php';
require_once __DIR__ . '/../Models/Patients.php';

class SigninController {

    public function index() {
        require __DIR__ . '/../Views/signin.php';
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Méthode non autorisée";
            return;
        }

        $nom      = trim($_POST['nom'] ?? '');
        $prenom   = trim($_POST['prenom'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role     = $_POST['role'] ?? '';

        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role)) {
            echo "Tous les champs sont obligatoires";
            return;
        }

        $hashed = $password;

        $user = new User();
$user->create($nom, $prenom, $email, $hashed, $role);
$id_user = $user->getLastInsertId(); 
if ($role === 'medecin') {
    $specialite = trim($_POST['specialite'] ?? 'Generaliste');
    $medecin = new Medecins();
    $medecin->create($nom, $prenom, $email, $hashed, $specialite, $id_user);

} elseif ($role === 'patient') {
    $num_secu = trim($_POST['num_secu'] ?? '');
    $patient = new Patients();
    $patient->create($nom, $prenom, $email, $hashed, $num_secu, $id_user);
} elseif ($role === 'secretaire') {
    require_once __DIR__ . '/../Models/Secretaires.php';
    $secretaire = new Secretaires();
    $secretaire->create($nom, $prenom, $email, $hashed, $id_user);
}

}
}