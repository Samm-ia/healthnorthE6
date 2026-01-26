
<?php
$pdo = new PDO('mysql:host=localhost;dbname=healthnorthE6', 'root', 'root');

$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->query('SELECT * FROM Patients');

var_dump($count);

?>