<?php


require_once('../config/config.php');


// permet de faire une requête SELECT sans parametres
$stmt = $pdo->query("SELECT * FROM product");
// retourne dans un tableau tous les produits 
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);