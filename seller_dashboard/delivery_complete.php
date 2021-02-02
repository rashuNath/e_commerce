<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');
use App\UserRegistration\UserRegistration;
use App\Seller\Seller;
use App\UserRegistration\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new UserRegistration();
$obj->setData($_SESSION);
$singleUser = $obj->view();


$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in();

$objectSeller = new Seller();

if(isset($_GET['order_number'])){
    $status = $objectSeller->complete_order($_GET['order_number']);
    if($status){
        $_SESSION['process-order'] = "The order is delivered successfully!";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['process-order'] = "Something Went wrong!";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}