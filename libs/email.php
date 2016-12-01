<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once "./phpmail/PHPMailerAutoload.php";

$mail = new PHPMailer;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "normunds.pauders";  // GMAIL username
$mail->Password   = "xfecahqedlolmgoh";                                  
$mail->FromName   = "Normunds Pauders";                                  

$mail->addAddress("normunds.pauders@eltelnetworks.com", "Normunds Pauders");

$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = "Pusdienas";
$mail->Body = "<i>Test</i>";


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

?>