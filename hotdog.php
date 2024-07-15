<?php

require_once('./Meal.php');

class HotDog extends Meal {

    private $bread;

    public function __construct($size, $bread){
        $this->size = $size;
        $this->bread = $bread;
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
}

$HotDogRaph = new HotDog('xl', 'toasté');


