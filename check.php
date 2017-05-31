<?php
require 'PHPMailer/class.phpmailer.php';
$mail = new PHPMailer();
ini_set('diaplsy_errors', 1);
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = trim($_POST["tel"]);
$accident_types = $_POST["accident_types"];
$client_source = $_REQUEST["utm_cs"];
$source = $_REQUEST["source"];
$keyword = $_REQUEST["keyword"];
$medium = $_REQUEST["utm_medium"];
$term = $_REQUEST["utm_term"];
$content = $_REQUEST["utm_content"];
$campaign = $_REQUEST["utm_campaign"];

////////////// 1st mail Part /////////////////////////

$subject="Enquiry for Injury Law Chambers";
$body  = '  <table border="0" cellpadding="5" cellspacing="0" width="35%">
            <tr><td width="35%">Name</td><td>' .$name. '</td></tr>
            <tr><td>Email</td><td>' .$email. '</td></tr>
            <tr><td>Phone number</td><td>' .$mobile. '</td></tr>
            <tr><td>Accident type</td><td>' .$accident_types. '</td></tr>
            
            </table><br><br>
            <em>This is an automatically generated email from www.interskale.in.Please do not reply to this email.</em>';
$mail->IsSMTP();   
//$mail->SMTPDebug  = 2; // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'do-not-reply@interskale.in';                // SMTP username
$mail->Password = 'donotreply123';                     // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->From = 'do-not-reply@interskale.in';
$mail->FromName = 'ILC Injury law chambers';
$mail->AddAddress("kavita@interskale.in");
//$mail->AddAddress("graemefletcher82@outlook.com");
//$mail->AddAddress("injurylawchambersclaims@gmail.com");
//$mail->addAddress("rohit@interskale.in");
//$mail->addBCC("meghna@interskale.in");
//$mail->addBCC("shraddha@interskale.in");
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = $body;
//$mail->Send();
   
$mail->clearAddresses();
$mail->clearBCCs();
header("Location:thank-you.html");
exit;