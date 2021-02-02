<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 25-04-18
 * Time: 14.59
 */

if(!isset($_SESSION))session_start();
include_once('../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;

//if(!isset($_SESSION['url'])){
//    $lurl = array();
//}else{
//    $lurl = $_POST['redirectTo'];
//    $count = count($lurl);
//    $lurl[$count % 2] = $_SERVER['HTTP_REFERER'];
//    $_SESSION['url'] = $lurl;
//}

//Utility::var_dump($_SESSION);
//Utility::var_dump($_POST);
$auth= new \App\UserRegistration\Auth();

if(isset($_POST['admin-login'])){
    $status = $auth->setData($_POST);
    $data = $auth->admin_is_registered();

    if($data){
        $_SESSION['email'] = $_POST['email'];
        Utility::redirect("../seller_dashboard/admin_dashboard.php");
    }else{
        Utility::redirect("../index.php");
    }
}elseif (isset($_POST['admin-register'])){
    $auth->setData($_POST);
    $data = $auth->storeAdminData();
    if($data){
        $_SESSION['admin-stored'] = "<div  id=\"message\" class=\"alert alert-success\" style=\"font-size: smaller  \" ><center>Your registration as admin is successfull.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['admin-stored'] = "<div  id=\"message\" class=\"alert alert-warning\" style=\"font-size: smaller  \" ><center>Your registration as admin is not successfull.</center></div>";
        Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}else{
    $status= $auth->setData($_POST);
    $data = $auth->is_registered();

    if($data){
        $_SESSION['email']=$_POST['email'];
//    $location = "../".$lurl;
        $_SESSION['login-success'] = "<div class='alert alert-success text-center'>You have been logged in successfully!</div>";
        Utility::redirect("../index.php");
    }else{
        $_SESSION['login-success'] = "<div class='alert alert-danger text-center'>One of your crediantial is wrong!</div>";
        Utility::redirect("../login.php");
    }
}


