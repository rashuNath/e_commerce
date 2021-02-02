<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 05-05-18
 * Time: 02.20
 */
if(!isset($_SESSION)){
    session_start();
}
include_once('vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;

$objectSeller = new \App\Seller\Seller();
$_POST['email']=$_SESSION['email'];

if($_FILES['picture']['name'] !=''){
    $file_name = time().$_FILES['picture']['name'];
    $_POST['picture']=$file_name;

    $source=$_FILES['picture']['tmp_name'];
    $destination = "Upload/$file_name";
    move_uploaded_file($source,$destination);
}else{
    if($_POST['old-picture']==''){
        $_POST['old-picture'] = '';
    }
    $_POST['picture'] = $_POST['old-picture'];
}
//echo $_POST['picture'];

$timestamp = time();

$_POST['entryDate'] = $timestamp;


if(isset($_POST['add-category'])){
    $objectSeller->setData($_POST);
    $objectSeller->storeCategory($_POST['sellerId']);
}

if(isset($_POST['add-sub-category'])){
    $objectSeller->setData($_POST);
    $objectSeller->storeSubCategory($_POST['sellerId']);
}

if(isset($_POST['add-product'])){
    $objectSeller->setProductData($_POST);
//    echo $objectSeller->emailReturn();
    $status = $objectSeller->storeProduct();
    if($status){
        $_SESSION['product-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Data has been added.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);

    }else{
        $_SESSION['product-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Something went wrong!</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}

if(isset($_POST['update-product'])){
    $objectSeller->setData($_POST);
    $objectSeller->updateProduct($_POST['productId']);
}

if(isset($_POST['update-category'])){
    $objectSeller->setData($_POST);
    $objectSeller->updateCategory();
}

//add item category
if(isset($_POST['add-item-category'])){
    //insert data
    $status = $objectSeller->storeItemCategory($_POST['name'],$_POST['picture']);
    if($status){
        $_SESSION['item-category-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Data has been added.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['item-category-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Something went wrong!</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}

//add item subcategory
if(isset($_POST['add-item-subcategory'])){
    //insert data
    $status = $objectSeller->storeItemSubCategory($_POST['item-category-id'],$_POST['name'],$_POST['picture']);
    if($status){
        $_SESSION['item-subcategory-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Data has been added.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['item-subcategory-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Something went wrong!</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}

//add product category
if(isset($_POST['add-product-category'])){
    //insert data
    $status = $objectSeller->storeProductCategory($_POST['item-subcategory-id'],$_POST['name'],$_POST['picture']);
    if($status){
        $_SESSION['product-category-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Data has been added.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['product-category-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Something went wrong!</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}

//add product brand
if(isset($_POST['add-product-brand'])){
    //insert data
    $status = $objectSeller->storeProductBrand($_POST['product-category-id'],$_POST['name'],$_POST['picture']);
    if($status){
        $_SESSION['product-brand-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Data has been added.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['product-brand-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Something went wrong!</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}
