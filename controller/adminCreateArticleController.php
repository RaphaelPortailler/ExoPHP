<?php

require_once('../config/config.php');


session_start();
if($_SESSION['username'] !== "Raphael"){
    //fait une redirection  vers la page connection
    header("Location: http://localhost:8888/tp-php-function/views/connexion.php");
}

//La super globale $_SERVER permet de récupérer les données de la requête 
//(et des infos) sur le serveur.
//Ici j'utilise la clé REQUEST_METHOD pour savoir si la requête du navigateur
// pour accéder au fichier est "POST"

function isRequestPost() {
	return $_SERVER["REQUEST_METHOD"] === "POST";
}


if (isRequestPost() && empty(getFormErrors())) {

	// je récupère la valeur des champs de formulaire envoyé
	// grâce à $_POST, avec en clé le nom du champs à récupérer
    $title = $_POST['title'];
    $content = $_POST['content'];
	$image = $_POST['image'];
    $createAt = new DateTime();
    $DateFormated = $createAt->format('d/M/Y');

	$handle = fopen("../articles.txt", 'a');

	
	$article = "Le titre est : " .$title. ", le contenu est : " .$content." et l'image est : ".$image. " le ". $DateFormated."\n";

    if ($handle) {
        fwrite($handle, $article);
        fclose($handle);
    } 

}



function isFormDataValid(){
    if(mb_strlen($_POST['content']) > 10
    && mb_strlen($_POST['title']) > 3
    && mb_strlen($_POST['image']) > 5) {
        return true ;
    } else {
        return false ;
    }
}

function getFormErrors(){

    $errors =[];
// TITLE
    if(mb_strlen($_POST['title']) < 3){
        $errors[] = "Le titre doit faire plus de 2 caractères";
    }
    if(mb_strlen($_POST['title']) > 20){
        $errors[] = "Le titre doit faire moins de 20 caractères";
    }
// CONTENUE
    if(mb_strlen($_POST['content']) <= 3){
        $errors[] = "Le contenue doit faire plus de 3 caractères";
    }
    if(mb_strlen($_POST['content']) >= 30){
        $errors[] = "Le contenue doit faire moins de 30 caractères";
    }
//IMAGE
    if(mb_strlen($_POST['image']) <= 3){
        $errors[] = "Le contenue doit faire moins de 30 caractères";
    }
    if(mb_strlen($_POST['image']) >= 15){
        $errors[] = "Le contenue doit faire moins de 30 caractères";
    }
// RETURN
    return $errors;
} 


 