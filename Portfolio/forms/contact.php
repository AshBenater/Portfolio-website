<?php

require_once '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPmailer/Exception.php';
require '../assets/vendor/PHPmailer/PHPMailer.php';
require '../assets/vendor/PHPmailer/SMTP.php';

$mail = new PHPMailer(true);
$message = ''; 

try {

    $mail->SMTPDebug = 0;                  
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_USER;
    $mail->Password = EMAIL_PASS;  
    $mail->SMTPSecure = 'ssl';  
    $mail->Port = 465;  

    $mail->setFrom('ash@ashleighbenater.com', 'Ashleigh Benater');
    $mail->addAddress('ash@ashleighbenater.com', 'Ashleigh Benater'); 


    $mail->isHTML(true);                                 
    $mail->Subject = $_POST['subject'];
    $mail->Body = 'Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . $_POST['message'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();


    echo 'OK';
} catch (Exception $e) {
    $message = 'Message could not be sent. Please try again later.';
}


echo $message;
?>
