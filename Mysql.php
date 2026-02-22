<?php
use App\Controllers\Database;

$pdo = Database::getInstance();

$stmt = $pdo->query("SELECT pseudo FROM patients");

$utilisateurs = $stmt->fetchAll();

foreach ($patients as $patients) {
    echo $patients['pseudo'] . '<br>';
}// page test