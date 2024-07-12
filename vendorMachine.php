<?php

 class vendorMachine {

 	private $snacks;

 	private $cashAmount;

 	private $isOn;

 	function __construct() {

 		$this->snacks = [
 			[
 				"name" => "Snickers",
 				"price" => 1,
 				"quantity" => 5
 			], 			
            [
 				"name" => "Mars",
 				"price" => 1.5,
 				"quantity" => 5
 			],
 			[
 				"name" => "Twix",
 				"price" => 2,
 				"quantity" => 5
 			],
 			[
 				"name" => "Bounty",
 				"price" => 2.5,
 				"quantity" => 5
 			]
 		];

 		$this->cashAmount = 0;
        $this->isOn = false;
 	}

 	public function turnOn() {
// allumer la machine 
        if($this->isOn === false){
            $this->isOn = true;
        }
 	}

 	public function turnOff() {
// s'il est après 18h (on ne peux pas éteindre la machine avant 18h)
        $currentHour = date('H');
        if($currentHour >= (18-2)){ // j'ai mis moins 2 car il se base sur l'horaire méridien 
// éteindre la machine
            $this->isOn = false;
        }
 	}

 	public function buySnack($snackName) {
// si la machine est allumer
        if($this->isOn === true){
// si le snack est présent dans la liste et que la quantité est suffisante, retirer une quantité pour ce snack on ajoute le montant 
            foreach($this->snacks as $key => $snack){
                if($snack['name'] === $snackName && $snack['quantity'] > 0){
                    $this->$snacks[$key]['quantity'] -= 1;
                    $this->cashAmount += $snack['price'];
                }
            }
        }
    }

 	public function shootWithFoot() {
// si la machine est allumée
        if($this->isOn === true){
//un snack au hasard tombe
        $randomSnack = round(rand(0, count($this->snacks) - 1));
//du cash au hasard tombe
        $randomCashAmount = round(rand(0, $this->cashAmount), 2);
//decrementer le snack et le cashAmount
            if($this->snacks[$randomSnack]['quantity'] > 0){
                $this->snacks[$randomSnack]['quantity']--;   
            }
            $this->cashAmount -= $randomCashAmount;
        }
 	}
}

$machine = new vendorMachine();
$machine->turnOn();
var_dump($machine);
$machine->shootWithFoot();
var_dump($machine);


