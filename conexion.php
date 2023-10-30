<?php
// Conexión a la base de datos
try {
    $pdo = new PDO('mysql:host=localhost;dbname=repaso', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
