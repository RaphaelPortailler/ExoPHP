<?php

require_once('../controller/listeBddController.php');

?>

<main>
    <div>
        <?php foreach($products as $product){ 
            echo "<p>Titre du produit : " . $product['title'] . "</p>";
            echo "<p>Sous-titre du produit : " . $product['sous_titre'] . "</p>";
            echo "<p>Description : " . $product['descriptions'] . "</p>";
            echo "<p>Date de création : " . $product['date_de_creation'] . "</p>";  
        } ?>
    </div>
</main>
