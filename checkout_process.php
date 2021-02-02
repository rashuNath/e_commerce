<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 16-05-18
 * Time: 23.41
 */

if(!isset($_SESSION)){
    session_start();
}
include_once('vendor/autoload.php');
require'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
use App\Utility\Utility;
use App\Message\Message;
use App\UserRegistration\UserRegistration;

if(isset($_SESSION['email'])){
    $recipient=$_SESSION['email'];
}else{
    $recipient=$_POST['client-email'];
}
echo $recipient;

$deliveryType = $_POST['deliveryType'];
$transaction = $_POST['transaction-id'];
$date = time();
$_POST['soldDate'] = date('Y/m/d');
$_SESSION['soldDate'] = date('Y/m/d');
if($transaction===""){
    $_POST['transaction-id']="cash";
}

if($deliveryType==="bikashDelivery"){
    $_SESSION['paymentType'] = "Bikash";
    $yourGmailAddress = 'rashu.me.web@gmail.com';
    $yourGmailPassword = 'rashuweb';
    $recipient = $recipient;

    $_POST['transaction-Id'] = $_POST['transaction-id'];

    date_default_timezone_set('Etc/UTC');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->isSMTP();
    //Tell PHPMailer to use SMTP
    //$mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465; //587
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl'; //tls
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $yourGmailAddress;
    //Password to use for SMTP authentication
    $mail->Password = $yourGmailPassword;
    $mail->setFrom($yourGmailAddress, 'e_commerce');
    $mail->addReplyTo($yourGmailAddress, 'e_commerce');
    $mail->addAddress($recipient);
    $mail->Subject = 'Verification link....';
    $mail->AltBody = 'This is a plain text message body';
    $message =  "thank you for your order. You will be notified as soon as possible whether your transaction was successfull or not. Thank you!";
    $mail->Body = $message;
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
//        Message::message("<strong>Success!</strong> Email has been sent successfully.");
//        $objectUser = new \App\UserRegistration\UserRegistration();
//        $objectUser->setData($_POST);
//        $status = $objectUser->storeNew();

        echo "mail send";



    }
}else{
    $_SESSION['paymentType'] = "Cash";
    $yourGmailAddress = 'rashu.me.web@gmail.com';
    $yourGmailPassword = 'rashuweb';
    $recipient = $recipient;

    $_POST['transaction-Id'] = $_POST['transaction-id'];

    date_default_timezone_set('Etc/UTC');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->isSMTP();
    //Tell PHPMailer to use SMTP
    //$mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465; //587
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl'; //tls
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $yourGmailAddress;
    //Password to use for SMTP authentication
    $mail->Password = $yourGmailPassword;
    $mail->setFrom($yourGmailAddress, 'e_commerce');
    $mail->addReplyTo($yourGmailAddress, 'e_commerce');
    $mail->addAddress($recipient);
    $mail->Subject = 'Your Order has been received!';
    $mail->AltBody = 'This is a plain text message body';
    $message =  "thank you for your order. Your product will be shiped to the given address by you. Be ready there with the payment. Thank you!";
    $mail->Body = $message;
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $_SESSION['order-complete'] = "<div class='alert alert-success text-center'>An email has been sent to yor email address!</div>";
        $objectSeller = new \App\Seller\Seller();

        $status = $objectSeller->setOrderData($_POST);
        $orderNumber = $objectSeller->getOrderNumber();
        $_SESSION['orderNumber'] = $orderNumber;

        $status = $objectSeller->setProductSoldData($_POST);

        $status = $objectSeller->storeOrder();

        $deleteStatus = $objectSeller->deleteOrderDataFromCart($_POST['user-id']);
        if($deleteStatus){
            echo "deleted";
            $status = $objectSeller->storeIntoProductSold($_POST['user-id']);
            header('Location:thankyou.php');
        }else{
            header("Location:cart.php");
        }
    }
}



