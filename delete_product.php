<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 15-05-18
 * Time: 22.19
 */
if(!isset($_SESSION)){
    session_start();
}
include_once('vendor/autoload.php');

$objectSeller = new \App\Seller\Seller();
//
//var_dump($_POST);
//var_dump($_SESSION);
//echo $_SESSION['email'];
//$quantity = $_POST['quantity'];
//$price = $_POST['totalPrice'];
//$_POST['totalPrice'] = $price * $quantity;
//

//
//if($status){
//    echo "data inserted sucessfully!";
//    header('Location:'.$_SERVER['HTTP_REFERER']);
//}else{
//    echo "something went wrong!";
//}

if(isset($_POST['deleteProduct'])){
    $objectSeller->setCartData($_POST);
    $status = $objectSeller->deleteFromCart($_POST['cartId']);
    $productsIntoCart = $objectSeller->productIntoCart($_POST['userId']);
    $result = array('status'=>$status,'productIntoCart'=>$productsIntoCart);
    echo json_encode($result);
}