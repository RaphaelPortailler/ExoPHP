<?php

class Pizza {

    private $price;

    private $base;

    private $size;

    private $ingredient1;

    private $ingredient2;

    private $ingredient3;

    private $status;

    private $orderedAt;

    public function __construct($base, $size, $ingredient1, $ingredient2, $ingredient3){
        $this->base = $base;
        $this->size = $size;
        $this->ingredient1 = $ingredient1;
        $this->ingredient2 = $ingredient2;
        $this->ingredient3 = $ingredient3;
        $this->status = "en cours de commande";
        $this->orderedAt = new DateTime("NOW");

        if($size === "s"){
            $this->price = 8;
        }

        if($size === "m"){
            $this->price = 10;
        }

        if($size === "l"){
            $this->price = 12;
        }

        if($size === "xl"){
            $this->price = 14;
        }
    } 
    
    public function pay($montant){
        if($this->status === "en cours de commande"){
            if($this->price === $montant){
                echo "<p> Merci pour votre commande, a bientot </p>";
                $this->status = "payé";
            } else {
                echo "<p> Veuillez regler le bon montant s'il vous plait, merci. </p>";
            }
        } else {
            echo "<p> Commande non validée </p>";
        }
    }

    public function ship(){
        if($this->status === "payé"){
            $this->status = "livré";
            echo "La commande a été livrée";
        } else {
            echo "La commande n'est pas encore payée";
        }
    }

    public function getIngredients(){
        return $this->ingredient1 . ', ' . $this->ingredient2 . ', ' . $this->ingredient3;
    }
    
    public function getSize(){
        return $this->size;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function getBase(){
        return $this->base;
    }
}

$pizzaRaph = new Pizza("tomate", "xl", "jambon", "champignons", "oeuf");
// var_dump($pizzaRaph);
// $pizzaRaph->pay(14);
// $pizzaRaph->ship();
?>

<main>
    <div>
        <h2>Ingrédients : </h2>
            <p><?php echo $pizzaRaph->getIngredients(); ?></p>
        <h2>Taille : </h2>
            <p><?php echo $pizzaRaph->getSize(); ?></p>
        <h2>Prix : </h2>
            <p><?php echo $pizzaRaph->getPrice(); ?></p>
        <h2>Base : </h2>
            <p><?php echo $pizzaRaph->getBase(); ?></p>
    </div>
</main>


                <!--    -------- VU AVEC PAPA  --------    -->

<!-- // // Parametre pour la connexion : 
// $servername = 'localhost';
// $dbname = 'restaurant';
// $login = '';
// $password = '';

// $conn = new PDO($servername, $login, $password);
// echo $conn; -->

<?php
mysqli_report(MYSQLI_REPORT_OFF);
// $dsn = "127.0.0.1:8889;dbname=restaurant";
$dsn = "127.0.0.1:8889";
$bdd = "restaurant";
$username = "root";
$password = "root";

$link = mysqli_connect($dsn, $username, $password, $bdd) or die ("tout pourris la connexion");
echo "coucou3";
$sql = "SELECT coding, libing FROM ingredients"; 
// $sql = "SELECT coding, libing FROM ingredients WHERE coding=2"; 
// $sql = "INSERT into ingredients VALUES (9, 'lardons')";
// $sql = "UPDATE ingredients SET libing = 'lardon' WHERE coding=9";
$sql = "DELETE from ingredients WHERE coding=7";
// $sql = "SELECT * FROM ingredients";
echo $sql . "<br>";
$date_jour = date("l/m///h:i:s");
echo $date_jour;
$result = mysqli_query($link, $sql);
$nombre = mysqli_affected_rows($link);
echo "Update Rows : " . $nombre;
echo "<br>";
echo "Query : " . $sql;
echo "<br>";
$date_jour = date("l/m///h:i:s");
echo $date_jour;

$noerreur = mysqli_errno($link);
echo "Numero Erreur : " . $noerreur;
// exit();
$erreur = mysqli_error($link);
$noerreur = mysqli_errno($link);
echo "Numero Erreur : " . $noerreur;
echo "erreur : " . $erreur;
echo "<br>";
echo "<br>";
$ligne = mysqli_fetch_array($result);
$erreur = mysqli_error($link);
$noerreur = mysqli_errno($link);
$nombre = mysqli_num_rows($result);
echo "Nombre de ligne trouvée : " . $nombre;
echo "<br>";
echo "<hr>";
echo "Numero Erreur : " . $noerreur;
echo "<br>";
echo "<hr>";
echo "erreur : " . $erreur;
echo "<br>";
echo "<hr>";
echo "<hr>";

$compteur = 1;
while ($compteur <= $nombre){
    echo "libelle ingredients : " . $ligne['libing'];
    echo "<br>";
    $compteur = $compteur + 1;
    $ligne = mysqli_fetch_array($result);
}
// echo "ligne" . $ligne["libing"];
// $ligne = mysqli_fetch_array($result);
// echo "<br>";
// echo "ligne" . $ligne["libing"];
// $ligne = mysqli_fetch_array($result);
// echo "<br>";
// echo "ligne" . $ligne["libing"];



// Parametre pour la connexion : (l'adresse de l'IP, nom de la BDD, user et mdp) : 
// $dsn = "mysql:host=127.0.0.1:8889;dbname=restaurant";
// $username = "root";
// $password = "root";

// // Je me connect a la base et gestion des erreurs.
// try {
//     $pdo = new PDO($dsn, $username, $password);
//     echo "tout va bien navette";
// } catch (PDOException $e) { 
//     die("Erreur de connexion : " . $e->getMessage());
// }

// Construction de la requete à éxécuter :
// $sql = "SELECT coding, libing FROM ingredients"; 
// echo "coucou1";

?>

