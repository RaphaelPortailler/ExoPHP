<?php

abstract class Meal {

    protected $size;

    protected $price;

    protected $status;

    protected $orderedAt;

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