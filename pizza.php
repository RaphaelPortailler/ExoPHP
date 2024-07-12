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
                echo "Merci pour votre commande, a bientot";
                $this->status = "payé";
            } else {
                echo "Veuillez regler le bon montant s'il vous plait, merci.";
            }
        } else {
            echo "Commande non validée";
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
}

$pizzaRaph = new Pizza("tomate", "xl", "jambon", "champignons", "oeuf");
$pizzaRaph->pay(10);
$pizzaRaph->ship();
var_dump($pizzaRaph);