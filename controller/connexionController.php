<?php 
require_once('../config/config.php');
//vérif si l'username de enregistré en session correspond a l'username envoyer
function logUser(){
    session_start();
        $_SESSION['username'] = $_POST['username'];
}
//redirige l'admin un fois connecté sur sa page de gestion d'article
function redirectToAdmin() {
	header("Location: http://localhost:8888/tp-php-function/views/adminCreateArticle.php");
}