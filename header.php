<?php
if(!isset($_SESSION) )session_start();
include_once('vendor/autoload.php');
use App\UserRegistration\UserRegistration;
use App\UserRegistration\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new UserRegistration();
$currentUserId = 0;

$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in_user();

//if(isset($_SESSION['email'])){
if($status){
    $obj->setData($_SESSION);
    $singleUser = $obj->view();
    if($singleUser){
        $currentUserId = $singleUser->user_id;
        $currentUserEmail = $singleUser->email;
    }else{
//        $currentUserId = 0;
//        $status = false;
        $status = false;
    }
}else{
    $cookie_name = 'tempUserNew';
    if(!isset($_COOKIE['tempUserNew'])){
        setcookie($cookie_name, uniqid(), time() + (3600*72), "/"); // 86400 = 1 day
    }
    $currentUserId = $_COOKIE['tempUserNew'];
}

$objectSeller = new \App\Seller\Seller();
//$categories = $objectSeller->viewCategory();

$featuredProducts = $objectSeller->featuredProductView();

$productIntoCart = $objectSeller->productIntoCart($currentUserId);

if(!$productIntoCart){
    $productIntoCart = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>online store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="assets/jqueryui/jquery-ui.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="stylesheet" type="text/css" href="css/custom-style.css">
    <!--===============================================================================================-->
</head>


<body class="">

<!-- header fixed -->
<div class="wrap_header fixed-header2 trans-0-4 justify-content-end">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <h2 class="logo-text">E-COMMERCE</h2>
    </a>

    <!-- Menu -->
    <div class="wrap_menu" style="margin-right:22%">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="index.php" class="">Home</a>
                </li>

                <li>
                    <a href="product.php">Shop</a>
                </li>

                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">
        <?php
        if(!$status){
            ?>
            <a href="login.php" class="header-wrapicon1 dis-block">
                Login
            </a>
            <?php
        }else{
            ?>
            <ul class="my-account-ul">
                <li>
                                   <span class="header-wrapicon1 dis-block m-l-30">
                                <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                                       <?php
                                       echo $singleUser->first_name;
                                       ?>
                            </span>
                    <ul class="dropdown-ul">
                        <?php
                        if($singleUser->user_type=='user'){
                            ?>
                            <!--                                    <li><a href="my_account.php">My Account</a> </li>-->
                            <li><a href="cart.php">My Cart</a> </li>
                            <li><a href="authentication/logout.php">Logout</a> </li>
                            <?php
                        }else{
                            ?>
                            <li><a href="seller_dashboard/seller_dashboard.php">Dashboard</a> </li>
                            <li><a href="authentication/logout.php">Logout</a> </li>
                            <?php
                        }
                        ?>

                    </ul>
                </li>
            </ul>
            <?php
        }
        ?>


        <span class="linedivide1"></span>

        <?php

        ?>

        <a href="registration.php">Register</a>

        <?php
        $cart = $objectSeller->cartView($currentUserId);
        ?>

        <div class="header-wrapicon2">

            <a href="cart.php" class="cart-icon">
                <img src="images/icons/icon-header-02.png" class="header-icon1" alt="ICON">
                <span class="cart-number"><?php echo $productIntoCart ?></span>
            </a>

            <!-- Header cart noti -->
            <!--						<div class="header-cart header-dropdown">-->
            <!--							<ul class="header-cart-wrapitem">-->
            <!--								<li class="header-cart-item">-->
            <!--									<div class="header-cart-item-img">-->
            <!--										<img src="images/item-cart-01.jpg" alt="IMG">-->
            <!--									</div>-->
            <!---->
            <!--									<div class="header-cart-item-txt">-->
            <!--										<a href="#" class="header-cart-item-name">-->
            <!--											White Shirt With Pleat Detail Back-->
            <!--										</a>-->
            <!---->
            <!--										<span class="header-cart-item-info">-->
            <!--											1 x $19.00-->
            <!--										</span>-->
            <!--									</div>-->
            <!--								</li>-->
            <!---->
            <!--								<li class="header-cart-item">-->
            <!--									<div class="header-cart-item-img">-->
            <!--										<img src="images/item-cart-02.jpg" alt="IMG">-->
            <!--									</div>-->
            <!---->
            <!--									<div class="header-cart-item-txt">-->
            <!--										<a href="#" class="header-cart-item-name">-->
            <!--											Converse All Star Hi Black Canvas-->
            <!--										</a>-->
            <!---->
            <!--										<span class="header-cart-item-info">-->
            <!--											1 x $39.00-->
            <!--										</span>-->
            <!--									</div>-->
            <!--								</li>-->
            <!---->
            <!--								<li class="header-cart-item">-->
            <!--									<div class="header-cart-item-img">-->
            <!--										<img src="images/item-cart-03.jpg" alt="IMG">-->
            <!--									</div>-->
            <!---->
            <!--									<div class="header-cart-item-txt">-->
            <!--										<a href="#" class="header-cart-item-name">-->
            <!--											Nixon Porter Leather Watch In Tan-->
            <!--										</a>-->
            <!---->
            <!--										<span class="header-cart-item-info">-->
            <!--											1 x $17.00-->
            <!--										</span>-->
            <!--									</div>-->
            <!--								</li>-->
            <!--							</ul>-->
            <!---->
            <!--							<div class="header-cart-total">-->
            <!--								Total: $75.00-->
            <!--							</div>-->
            <!---->
            <!--							<div class="header-cart-buttons">-->
            <!--								<div class="header-cart-wrapbtn">-->
            <!--									<!-- Button -->
            <!--									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">-->
            <!--										View Cart-->
            <!--									</a>-->
            <!--								</div>-->
            <!---->
            <!--								<div class="header-cart-wrapbtn">-->
            <!--									<!-- Button -->
            <!--									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">-->
            <!--										Check Out-->
            <!--									</a>-->
            <!--								</div>-->
            <!--							</div>-->
            <!--						</div>-->
        </div>
    </div>
</div>

<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">

        <div class="wrap_header justify-content-end">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <h2 class="logo-text">E-COMMERCE</h2>
            </a>

            <!-- Menu -->
            <div class="wrap_menu" style="margin-right:22%">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="index.php" class="">Home</a>
                        </li>

                        <li>
                            <a href="product.php">Shop</a>
                        </li>

                        <li>
                            <a href="about.php">About</a>
                        </li>

                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <?php
                if(!$status){
                    ?>
                    <a href="login.php?redirectTo=http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" class="header-wrapicon1 dis-block">
                        Login
                    </a>
                    <?php
                }else{
                    ?>
                    <ul class="my-account-ul">
                        <li>
                                   <span class="header-wrapicon1 dis-block m-l-30">
                                <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                                       <?php
                                       echo $singleUser->first_name;
                                       ?>
                            </span>
                            <ul class="dropdown-ul">
                                <?php
                                if($singleUser->user_type=='user'){
                                    ?>
                                    <!--                                    <li><a href="my_account.php">My Account</a> </li>-->
                                    <li><a href="cart.php">My Cart</a> </li>
                                    <li><a href="authentication/logout.php">Logout</a> </li>
                                    <?php
                                }else{
                                    ?>
                                    <li><a href="seller_dashboard/seller_dashboard.php">Dashboard</a> </li>
                                    <li><a href="authentication/logout.php">Logout</a> </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </li>
                    </ul>
                    <?php
                }
                ?>


                <span class="linedivide1"></span>

                <?php

                ?>

                <a href="registration.php">Register</a>

                <?php
                //                    if(!$singleUser){
                //                        $singleUser->user_id = 0;
                //
                //                    }
                $cart = $objectSeller->cartView($currentUserId);
                ?>

                <div class="header-wrapicon2">
                    <a href="cart.php" class="cart-icon">
                        <img src="images/icons/icon-header-02.png" class="header-icon1" alt="ICON">
                        <span class="cart-number"><?php echo $productIntoCart ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.php" class="logo-mobile">
            <img src="images/icons/logo.png" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="images/item-cart-01.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="images/item-cart-02.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="images/item-cart-03.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>USD</option>
                                <option>EUR</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.php">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.php">Homepage V1</a></li>
                        <li><a href="home-02.html">Homepage V2</a></li>
                        <li><a href="home-03.html">Homepage V3</a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="product.php">Shop</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="product.php">Sale</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="cart.php">Features</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="blog.html">Blog</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="about.php">About</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
