<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function sendMail($email,$name,$subject,$txt){
$mail = new PHPMailer(true);


    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(true);                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Enter SMTP Username Here';                     //SMTP username
    $mail->Password   = 'Enter SMTP Password Here';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Set From Email', 'MLM Project');
    $mail->addAddress($email, $name);    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  $subject;
    $mail->Body    = $txt;

    $mail->send();
    
}