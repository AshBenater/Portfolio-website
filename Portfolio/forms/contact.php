<?php

require_once '../../Config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPMailer/Exception.php';
require '../assets/vendor/PHPMailer/PHPMailer.php';
require '../assets/vendor/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$message = ''; // Initialize the message variable

try {
    // Server settings
    //$mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_USER;
    $mail->Password = EMAIL_PASS;  // Ensure this is correctly sourced from your config file
    $mail->SMTPSecure = 'ssl';  // or 'tls' if using port 587
    $mail->Port = 465;  // or 587 for TLS

    // Recipients
    $mail->setFrom('ash@ashleighbenater.com', 'Ashleigh Benater');
    $mail->addAddress('ash@ashleighbenater.com', 'Ashleigh Benater'); // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body = 'Name: ' . $_POST['name'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . $_POST['message'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    // Assign a success message to the $message variable
    echo 'OK';
} catch (Exception $e) {
    $message = 'Message could not be sent. Please try again later.';
}

// Display the message (either success or error)
echo $message;
?>
