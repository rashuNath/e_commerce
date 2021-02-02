<?php
include_once('vendor/autoload.php');

   if(!isset($_SESSION) )session_start();

use App\Message\Message;
use App\Utility\Utility;
$auth= new \App\UserRegistration\Auth();

$isLoggedin = $auth->logged_in();
if($isLoggedin){
    header('Location:seller_dashboard/admin_dashboard.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>login - Admin</title>
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
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="css/form-elements.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom-style.css">
</head>
<body>
<!-- Top content -->
<div class="top-content">
    <div class="container" >
        <table>
            <tr>
                <td width='230' >

                <td width='600' height="50" >


                    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

<!--                    <div  id="message" class="form button" style="font-size: smaller  " >-->
<!--                        <center>-->
<!--                            --><?php //if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
//                                        echo "&nbsp;".Message::message();
//                                    }
//                                    Message::message(NULL);
//                                    ?><!--</center>-->
<!--                    </div>-->
                    <?php } ?>
                </td>
            </tr>
        </table>

        <div class="container" >

            <div class="message-container">
                <?php
                if(isset($_SESSION['admin-stored']) && $_SESSION['admin-stored']!=""){
                    echo $_SESSION['admin-stored'];
                    $_SESSION['admin-stored'] = '';
                }
                ?>
            </div>


            <?php if($auth->admin_is_exist()): ?>
            <div class="registration-box m-auto">
                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to admin panel</h3>
                            <p>Enter username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="authentication/login_backend.php" method="post" class="login-form">
<!--                            <input type="hidden" value="--><?php //echo $_GET['redirectTo'];?><!--" name="redirectTo">-->
                            <div class="form-group">
                                <label class="" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" autocomplete="off" required>
                            </div>
                            <input type="hidden" name="user_type" value="admin">
                            <button type="submit" class="btn" name="admin-login">Login</button>
                        </form>

                        <a href="index.php" class="mt-4">View the site!</a>
                    </div>
                </div>

            </div>
            <?php else: ?>
            <div class="registration-box m-auto">
                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Register as an admin</h3>
<!--                            <p>Enter username and password to log on:</p>-->
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="authentication/login_backend.php" method="post" class="login-form">
                            <!--                            <input type="hidden" value="--><?php //echo $_GET['redirectTo'];?><!--" name="redirectTo">-->
                            <div class="form-group">
                                <label class="" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" autocomplete="off" required>
                            </div>
                            <input type="hidden" name="user_type" value="admin">
                            <button type="submit" class="btn" name="admin-register">Register</button>
                        </form>

                        <a href="index.php" class="mt-4">View the site!</a>
                    </div>
                </div>

            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>
</body>
</html>