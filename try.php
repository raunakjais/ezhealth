<?php
//include("config/config.php"); 
include("SMTPconfig.php");
include("SMTPClass.php");
/*$_SESSION['email']='manojgupta9305@gmail.com';
$_SESSION['name']='chirag';
$_SESSION['randomnumber']='124587';*/
	$to = "manoj@vallesoft.com";
	$from = "support@ezpointment.com"; 
	$subject = "ezpointment Registration Code";
	//$body = "Dear ".$_SESSION['name'].", Welcome to Ezpointment ! Please enter this code ".$_SESSION['randomnumber']." to complete your online registration. ";
	$body = "dummy body txt";
	
	/*$headers  = "From: $from"."\r\n"; 
	$headers .= "Content-type: text/html\r\n"; 
	$mm = mail($to, $subject, $message, $headers);*/
	
	
	$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
	$SMTPChat = $SMTPMail->SendMail();
	print_r($SMTPChat);
?>