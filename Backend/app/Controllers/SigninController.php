<?php

class SigninController {

    public function index() {
       require __DIR__ . '/../Views/signin.php';
    }

    public function register() {
        

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Méthode non autorisée";
            return;
        }

        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'];


        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role)) {
            echo "Tous les champs sont obligatoires";
            return;
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        require_once __DIR__ . '/../Models/User.php';
        $user = new User();
        $user->create($nom, $prenom, $email, $password, $role);

        echo "Inscription réussie";
    }
}
