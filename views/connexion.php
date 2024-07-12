<?php require_once('../controller/connexionController.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css" />

    <title>Document</title>
</head>
<body>
    <form method="post" id="formConnex">
        <div>
            <label for="username">Identifiant :
                <input type="text" id="username" name="username" required>
            </label>
        </div>
        <div>
            <label for="password">Password :
                <input type="text" name="password" id="password" required>
            </label>
        </div>
        <div>
            <input type="submit" value="Connexion">
        </div>
    </form>

<?php   
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   if( $_POST['username'] === "Raphael" &&
       $_POST['password'] === "mdptest"){ ?>

        <?php logUser(); ?>
        <?php redirectToAdmin(); ?>

        <p>Connexion en cours...</p>

    <?php } else { ?>

        <p>Votre identifiant ou votre mot de passe est incorrect</p>

    <?php }
}?>
</body>
</html>
