<?php 

require_once('../config/config.php');

session_start();
if($_SESSION['username'] !== "Raphael"){
    //redirection vers la page connection pour l'admin
    header("Location: http://localhost:8888/tp-php-function/views/connexion.php");
}

file_put_contents('../articles.txt', '');