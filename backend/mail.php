<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'mailer/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.example.com';                                 //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = '';                           //SMTP username
    // $mail->Password   = '';                        //SMTP password
    // $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // PHPMailer::ENCRYPTION_SMTPS
    //Content format
    // $mail->isHTML(true);        //Set email format to HTML
    // $mail->CharSet = "UTF-8"; 

    $mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = 'c52dd7d81e9d6b';
$mail->Password = '222ae62649c9a3';

// Content
$mail->isHTML(true);  
$mail->CharSet = "UTF-8";
   
?>

