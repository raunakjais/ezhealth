<?php
include('ezEMail.php');
include("config/config.php");
$qq=explode('~',$_GET['q']);
if($qq[1]=='disp_msg')
{	
	$val=explode('^',$qq[0]);
	$new_rand_code=rand(1, 1000000);
	
	$update_code=mysql_query("update user_registration_code set USER_REG_RANDOM_CODE='".$new_rand_code."' where USER_REG_CODE_USERNAME='".$val[0]."' and USER_REG_CODE_EMAIL='".$val[2]."'");
	if($update_code==1)
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://myvaluefirst.com/smpp/sendsms?");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
				"username=ezpointment&password=ezpoint1&to=".$_SESSION['mobilenumber']."&from=EZAPPT&udh=0&text= Dear ".$_SESSION['name'].", Welcome to Ezpointment ! Please enter this code ".$new_rand_code." to complete your online registration. &dlr-mask=19&dlr-url");
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);
	
	$to = $_SESSION['email'];
	$from = $from; 
	$subject = "ezpointment Registration Code";
	$body = "Dear ".$_SESSION['name'].", Welcome to Ezpointment ! Please enter this code ".$new_rand_code." to complete your online registration.";
	$result = ezEMail::sendSMTPMessage($to, $from, "support", $subject,$body);	
	
		if($server_output=='Sent.')
		{
			print "Code sent successfully..";
		}
		else
		{
			print "Please try again..";
		}
	
	}
}
?>