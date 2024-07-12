<?php require_once('../controller/productsController.php'); ?>
<?php require_once('../partials/header.php'); ?>

<main>
    <h2>Créer un article : </h2>
    <form>
        <select name="category">
            <optgroup label="Categories :">
                <option selected disabled>- choisis ta catégorie -</option>
                    <?php foreach($categories as $category){ 
                        echo "<option value=".$category.">".$category."</option>";
                    } ?>
            </optgroup>
        </select> 

            <label>Prix Minimum :</label>
                    <input type="number" name="pricemin" min="<?php echo $productPricemin; ?>">

            <label>Prix Maximum :</label>
                    <input type="number" name="pricemax" max="<?php echo $productPricemax; ?>">


        <select name="sort">
            <option value="">Par défaut</option>
            <option value="price">Prix</option>
            <option value="createdAt">Date de Création</option>
        </select>
        <input type="submit" value="Filtrer"/>
    </form>

    <button><a href="http://localhost:8888/tp-php-function/views/products.php">Reset</a></button>

    <section>
        <?php foreach($products as $product){ ?>
           <h2>Nom :<?php echo $product['name']; ?></h2> 
           <p>Prix :<?php echo $product['price']; ?></p> 
           <p>Catégorie :<?php echo $product['category']; ?></p> 
           <p>Description :<?php echo $product['description']; ?></p> 
           <!-- J'utilise la calsse DateTime avec le mot clé "new" et je lui passe en paramètre une date en chaine de caractères. DateTime créé une "vrai" date que l'on va pouvoir manipuler -->
           <?php $createdAtDateTime = new DateTime($product['createdAt']);?>
           <p>Date de création :<?php echo $createdAtDateTime->format('j/M/Y'); ?></p>
        <?php } ?>
    </section>
</main>

<?php require_once('../partials/laterale.php'); ?>
<?php require_once('../partials/footer.php'); ?>