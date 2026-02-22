<?php

use App\Models\User;


class LoginController {

    public function index() {
       require __DIR__ . '/../Views/login.php';
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Méthode non autorisée";
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo "Tous les champs sont obligatoires";
            return;
        }

        require_once __DIR__ . '/../Models/User.php';
        $userModel = new User;
        $user = $userModel->get($email);
        if (!$user) {
             echo "Email introuvable";
             return; }

        //if (!password_verify($password, $user['password'])) {
             if ($password !== $user['password']) {

        echo "Mot de passe incorrect"; 
             return;
            }
            $_SESSION['user'] = $user; 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];


            header("Location: ?controller=rdv&action=index"); exit;
    }
}