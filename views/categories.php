<?php require_once('../controller/categoriesController.php'); ?>
<?php require_once('../partials/header.php'); ?>
<main>
    <section>
        <h1>LA liste des catégories :</h1>

        <?php foreach($categories as $category){ ?>
            <article>
                <h2><?php echo $category['name']; ?></h2>
            </article>
        <?php } ?>
    </section>
</main>
<?php require_once('../partials/laterale.php'); ?>
<?php require_once('../partials/footer.php'); ?>