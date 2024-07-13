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