<?php 

class Order{

    private $status;

    private $totalPrice;

    private $productQty;

    private $id;

    private $customer;

    function __construct($customerName){
        $this->status = "En cours";
        $this->totalPrice = 0;
        $this->productQty = 0;
        $this->id = uniqid();
        $this->customer = $customerName;
    }

    function pay(){
        // si commande status en cours
        // si productQty et totalPrice > 0
        if($this->status === "En cours" && $this->productQty > 0 && $this->totalPrice > 0){
            $this->status = "C'est payé, merci !";
        }
    }

    function cancel(){
        if($this->status === "En cours" && $this->productQty > 0 && $this->totalPrice > 0){
            $this->status = "Commande annulé";
            $this->totalPrice = 0;
            $this->productQty = 0;
        }
    }

    function addProduct(){
        if($this->status === "En cours"){
            $this->productQty = $this->productQty +1;
            $this->totalPrice = $this->totalPrice +10;
        }
    }

    function removeProduct(){
        if($this->status === "En cours" && $this->productQty > 0 && $this->totalPrice > 0){
            $this->productQty = $this->productQty -1;
            $this->totalPrice = $this->totalPrice -10;
        }
    }

}


// quand je veux créer une nouvelle commande
// j'instancie (je créé un objet) la classe Order grâce au mot clé new
// Quand je créé un objet de type order avec le mot clé new
// la fonction constructor est automatiquement appelée
// permettant (si besoin) d'initialiser la commande avec des propriétés par défaut
$order = new Order("Raphael Portailler");
var_dump($order);





