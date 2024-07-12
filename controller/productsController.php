<?php

require_once('../config/config.php');

$products = [
    [
        'name' => 'Aspirateur',
        'price' => 100,
        'category' => 'electro-menager',
        'description' => 'Description du produit 1',
        'createdAt' => '01-07-2024'
    ],
    [
        'name' => 'Frigo',
        'price' => 200,
        'category' => 'electro-menager',
        'description' => 'Description du produit 2',
        'createdAt' => '01-12-2024'
    ],
    [
        'name' => 'Four',
        'price' => 300,
        'category' => 'electro-menager',
        'description' => 'Description du produit 3',
        'createdAt' => '01-11-2024'
    ],
    [
        'name' => 'Télévision',
        'price' => 400,
        'category' => 'electro-menager',
        'description' => 'Description du produit 4',
        'createdAt' => '11-09-2024'
    ],
    [
        'name' => 'Ordinateur',
        'price' => 500,
        'category' => 'informatique',
        'description' => 'Description du produit 5',
        'createdAt' => '12-07-2024'
    ],
    [
        'name' => 'Tablette',
        'price' => 600,
        'category' => 'informatique',
        'description' => 'Description du produit 6',
        'createdAt' => '01-07-2024'
    ],
    [
        'name' => 'Smartphone',
        'price' => 700,
        'category' => 'informatique',
        'description' => 'Description du produit 7',
        'createdAt' => '01-08-2024'
    ],
    [
        'name' => 'Appareil photo',
        'price' => 800,
        'category' => 'informatique',
        'description' => 'Description du produit 8',
        'createdAt' => '01-03-2024'
    ],
    [
        'name' => 'Vélo',
        'price' => 900,
        'category' => 'sport',
        'description' => 'Description du produit 9',
        'createdAt' => '01-04-2024'
    ],
    [
        'name' => 'Tapis de course',
        'price' => 1000,
        'category' => 'sport',
        'description' => 'Description du produit 10',
        'createdAt' => '01-09-2024'
    ],
    [
        'name' => 'Haltères',
        'price' => 1100,
        'category' => 'sport',
        'description' => 'Description du produit 11',
        'createdAt' => '01-05-2024'
    ],
    [
        'name' => 'Ballon de foot',
        'price' => 1200,
        'category' => 'sport',
        'description' => 'Description du produit 12',
        'createdAt' => '01-06-2024'
    ]
];

$categories=[];

foreach($products as $product){
    if(!in_array($product['category'], $categories)){
        $categories[] = $product['category'];
    };
}

$productPricemin = $products[0]['price'];

foreach($products as $product){
    if($product['price'] < $productPricemin){
        $productPricemin = $product['price'];
    };
}

$productPricemax = $products[0]['price'];

foreach($products as $product){
    if($product['price'] > $productPricemax){
        $productPricemax = $product['price'];
    };
}



if(!empty($_GET)){
    if(!empty($_GET['category'])){
        $products = array_filter($products, function($product){
            return $product['category'] === $_GET['category'];
        });
    };

    if(!empty($_GET['pricemin'])){
        $products = array_filter($products, function($product){
            return $product['price'] >= (float)$_GET['pricemin']; 
        });
    };

    if(!empty($_GET['pricemax'])){
        $products = array_filter($products, function($product){
            return $product['price'] <= (float)$_GET['pricemax']; 
        });
    };
}


$productsUsort = $products;
//si j'ai un parametre GET nommé "sort" et qu'il est égale a price 
if(isset($_GET['sort']) && $_GET['sort'] === 'price'){

    //alors j'utilise la fonction php usort qui permet de trier, je trie en fonction du prix usort ne retourne pas de nouveau tableau, mais modifie le tableau original ($products)
    usort($products, function($a,$b){
        return $a['price'] <=> $b['price'];
    });
}

// trie en fonction des date de création des produits

if(isset($_GET['sort']) && $_GET['sort'] === 'createdAt'){
    usort($products, function($a,$b){
        $date1 = new DateTime($a['createdAt']);
        $date2 = new DateTime($b['createdAt']);


        return $date1 <=> $date2;
    });
}

