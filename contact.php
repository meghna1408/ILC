<?php
require 'PHPMailer/class.phpmailer.php';
include("connect.php");
$mail = new PHPMailer();

$name = $_POST["name"];
$mobile = trim($_POST["tel"]);
$client_source = $_REQUEST["utm_cs"];
$source = $_REQUEST["source"];
$keyword = $_REQUEST["keyword"];
$medium = $_REQUEST["utm_medium"];
$term = $_REQUEST["utm_term"];
$content = $_REQUEST["utm_content"];
$campaign = $_REQUEST["utm_campaign"];
date_default_timezone_set('Europe/London');
echo '<pre>';
print_r($_REQUEST);
$ukTime= date('d/m/Y h:i a', time());

$record_query="Select SUBSTRING(enquiry_id, 4) as record from $tbl_name ORDER BY id DESC LIMIT 0,1";
$result=mysql_query($record_query);
$record=mysql_fetch_assoc($result);
$enquiry_code=$record['record']+1;

$query1="INSERT INTO ".$tbl_name." (submitted,enquiry_id,yourname,contact_no,status,region_id,brand_id,source,medium,term,content,campaign,user_id,uk_date_time)"
        . " VALUES (date_add(now(),INTERVAL 630 Minute),CONCAT('ILC','$enquiry_code'),'$name','$mobile','88001','8801','88','$source','$medium','$term','$content','$campaign','167','$ukTime')";
//        mysql_query($query1) or die ('Error updating database');
        
$subject="Request a call back for Injury Law Chambers";
$body  ='<table border="0" cellpadding="5" cellspacing="0" width="75%">
        <tr><td width="35%">Name</td><td>' .$name. '</td></tr>	
        <tr><td>Phone number</td><td>' .$mobile. '</td></tr>
        </table>';
$mail->IsSMTP();   
//$mail->SMTPDebug  = 2; // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                                // Enable SMTP authentication
$mail->Username = 'do-not-reply@interskale.in';                // SMTP username
$mail->Password = 'donotreply123';                    // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->From = 'do-not-reply@interskale.in';
$mail->FromName = 'Injury Law Chambers Request a call back';
//$mail->AddAddress("graemefletcher82@outlook.com");
//$mail->AddAddress("injurylawchambersclaims@gmail.com");
//$mail->addAddress("rohit@interskale.in");
//$mail->addBCC("meghna@interskale.in");
$mail->addBCC("kavita@interskale.in");
//$mail->addBCC("shraddha@interskale.in");
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = $body;
$mail->Send();
$mail->clearAddresses();
$mail->clearBCCs();
header("Location:thank-you.html");
?>