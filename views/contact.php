<?php require_once('../controller/contactController.php'); ?>
<?php require_once('../partials/header.php'); ?>


        <main>
            <form method="post">
                <label for="">
                    <input type="text" placeholder="Entrez votre nom" name="lastname">
                    <input type="text" placeholder="Entrez votre message" name="message">
                    <input type="email" placeholder="Entrez votre email" name="email">
                    <input type="submit">
                </label>
            </form>

            <?php if(isset($_REQUEST['lastname'])) { ?>
                <?php if(checkIfFormIsValid($_REQUEST)) { ?>
                        <p>
                            Merci <?php echo $_REQUEST['lastname']; ?> pour votre message via votre email : <?php echo $_REQUEST['email']; ?>. Votre message est le suivant : <?php echo $_REQUEST['message']; ?> !
                        </p>
                <?php } else { ?>
                        <p>
                            Entrez des données correct
                        </p>
                <?php } ?>    
            <?php } ?>    
            
<?php require_once('../partials/laterale.php'); ?>

        </main>
</body>

