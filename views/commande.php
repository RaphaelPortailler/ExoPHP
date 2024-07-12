<?php require_once('../controller/commandeController.php'); ?>
<main>
    <section>
        <h1>Listes des commandes :</h1>
        <!-- on effectue une boucle pour parcourir le tableau des commandes stockés dans la variables $orders et venir créer un article de chacune de ces commandes -->
            <?php foreach($orders as $order){ ?>
                <article>
                    <p>ID :<?php echo $order['id']; ?></p>
                    <p>Customer :<?php echo $order['customer']; ?></p>
                    <p>Amout :<?php echo $order['amount']; ?></p>
                    <?php foreach($order['products'] as $product){ ?>
                            <p>Produit :<?php echo $product; ?><p>
                    <?php } ?>
                    <!-- On viens transformer la date enregistrée dans un nouveau format pour l'affichage -->
                    <?php $date = new DateTime($order['date']); ?>
                    <p>Date :<?php echo $date->format("d/m/Y")?></p>
                    <br>
                </article>
            <?php } ?>
    </section>
</main>