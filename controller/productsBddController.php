<?php

require_once('../config/config.php');

// On stock dans une variable la requete SQL que l'on prepare pour l'executer
$sql = "INSERT INTO product (title, sous_titre, descriptions) VALUES (:title, :sous_titre, :descriptions)";
$stmt = $pdo->prepare($sql);

// Définir les paramètres et exécuter
$titre = "Exemple de titre";
$sous_titre = "Exemple de sous-titre";
$description = "Ceci est une description d'exemple pour le produit.";

// Avec bindParam on viens vérifier que la valeur de chaque élément a inserer dans notre colonne article ne soit pas une VRAI requete SQL (injection SQL).
$stmt->bindParam(':title', $titre);
$stmt->bindParam(':sous_titre', $sous_titre);
$stmt->bindParam(':descriptions', $description);

// Exécuter la requête stocker dans sa variable 
if ($stmt->execute()) {
	echo "Nouveau produit ajouté avec succès";
} else {
	echo "Erreur lors de l'ajout du produit";
}