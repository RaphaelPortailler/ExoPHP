<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_set_cookie_params(3600);

// Parametre pour la connexion : (l'adresse de l'IP, nom de la BDD, user et mdp) : 
$dsn = "mysql:host=127.0.0.1:8889;dbname=piscine_php";
$username = "root";
$password = "root";

// Je me connect a la base et gestion des erreurs.
try {
    $pdo = new PDO($dsn, $username, $password);
    echo "tout va bien navette";
} catch (PDOException $e) { 
    die("Erreur de connexion : " . $e->getMessage());
}