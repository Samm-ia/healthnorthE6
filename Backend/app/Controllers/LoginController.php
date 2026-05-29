<?php


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
            $_SESSION['user']['role'] = $user['role'];

            switch ($user['role']) {
                case 'secretaire':
                    header("Location: ?controller=secretaire&action=index");
                    exit;

                case 'medecin':
                    header("Location: ?controller=medecin&action=index");
                    exit;

                case 'patient':
                    header("Location: ?controller=rdv&action=index");
                    exit;

                default:
                    header("Location: ?controller=home&action=index");
                    exit;
            }
    }

    public function logout() {
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = array();
    session_destroy();
    header("Location: ?controller=login&action=index");
    exit;
}
}