<?php require_once('../controller/reviewsController.php'); ?>
<?php require_once('../partials/header.php'); ?>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<main>
    <section>
        <h1>La liste des reviews :</h1>
            <?php foreach($reviews as $review){ ?>
                <article>
                    <h2><?php echo $review['user']; ?></h2>
                    <p><?php echo $review['message']; ?></p>
                    <p><?php echo $review['rating']; ?></p>
                </article>
            <?php } ?>
    </section>
</main>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<?php require_once('../partials/laterale.php'); ?>
<?php require_once('../partials/footer.php'); ?>
