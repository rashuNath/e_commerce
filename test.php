<?php
require_once ('vendor/autoload.php');

$objTest = new \App\UserRegistration\UserRegistration();

$objectSeller = new \App\Seller\Seller();


$itemSubcategory = $objectSeller->viewAllMethod('item_subcategory');
//var_dump($itemSubcategory);

$product = $objectSeller->productView();
echo $product;


if(isset($_POST['item_category'])){
    echo "test";
}else{
    echo "not test";
}